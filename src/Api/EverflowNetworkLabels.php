<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkLabels
{
    public function all()
    {
        return EverflowHttpClient::get('networks/labels');
    }

    public function get($label)
    {
        return EverflowHttpClient::get('networks/labels/' . $label);
    }

    public function add($label, $data = [])
    {
        // Append label ID to $data
        $data['label'] = $label;

        return EverflowHttpClient::post('networks/labels', $data);
    }

    public function update($label, $data = [])
    {
        // Append label ID to $data
        $data['label'] = $label;

        return EverflowHttpClient::put('networks/labels', $data);
    }

    public function delete($label)
    {
        return EverflowHttpClient::delete('networks/labels', ['label' => $label]);
    }
}