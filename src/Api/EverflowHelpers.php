<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowFacade as Everflow;
use CodeGreenCreative\Everflow\EverflowApiBase;

use Illuminate\Http\Request;

class EverflowHelpers extends EverflowApiBase
{
    public function formatCustomFieldsFromArray(array $input)
    {
        // Gets currently used fields from Everflow
        $everflowCustomFields = Everflow::network()->settings()->customFields(true);

        // Where we'll be storing the custom info we'll be sending
        $everflowCustomInfo = [];
        foreach ($everflowCustomFields as $fieldKey => $fieldDefinitions) {
            // Checks cases where a field was not supplied
            if (!isset($input[$fieldKey])) {
                // If the field is required, then we'll throw an Exception to let the user know (this must be handled in a higher level)
                if ($fieldDefinitions->is_required) {
                    throw new \Exception("The field '{$fieldKey}' is required but was not supplied");
                }

                // In all other cases, we simply skip non-required fields
                continue;
            }
            
            // Add the custom info field that will go into the request to Everflow
            $everflowCustomInfo[] = [
                'field_value' => $input[$fieldKey],
                'network_id' => $fieldDefinitions->network_id,
                'network_signup_custom_field_id' => $fieldDefinitions->network_signup_custom_field_id,
            ];
        }

        // Finally, returns the processed fields ready to send to Everflow
        return $everflowCustomInfo;
    }

    public function formatCustomFieldsFromRequest(Request $request, array $mapping)
    {
        // Maps a request.input key to a laravel-everflow custom field
        // Format: my.request.key => laravel_everflow_custom_field_slug

        $input = [];
        foreach ($mapping as $requestKey => $everflowKey) {
            if ($request->has($requestKey)) {
                $input[$everflowKey] = $request->input($requestKey);
            }
        }

        // Now passthrough the input data to our main function
        return $this->formatCustomFieldsFromArray($input);
    }
}