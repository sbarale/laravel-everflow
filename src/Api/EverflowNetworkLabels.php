<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkLabels extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get('networks/labels');
    }

    public function get()
    {
        return EverflowHttpClient::get('networks/labels/' . $this->id());
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post('networks/labels', $data);
    }

    public function update($label, $data = [])
    {
        // Append label ID to $data
        $data['label'] = $label;

        return EverflowHttpClient::put('networks/labels', $data);
    }

    public function delete()
    {
        return EverflowHttpClient::delete('networks/labels', ['label' => $this->id()]);
    }
}