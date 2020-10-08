<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkLabels extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/labels'));
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/labels/:label', [
            'label' => $this->id(),
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/labels'), $data);
    }

    public function update($label, $data = [])
    {
        // Append label ID to $data
        $data['label'] = $label;

        return EverflowHttpClient::put(EverflowHttpClient::route('networks/labels'), $data);
    }

    public function delete()
    {
        return EverflowHttpClient::delete(EverflowHttpClient::route('networks/labels'), ['label' => $this->id()]);
    }
}