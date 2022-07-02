<?php

use App\Models\Settings;

function Settings($key)
{
    if (!empty($key)) {
        $settingsInfo = Settings::where('key', $key)->first();
        return $settingsInfo->value;
    }
}

function updateSettings($key, $value)
{
    if (!Settings::where('key', $key)->first()) {
        Settings::create([
            'key' => $key,
            'value' => $value
        ]);
        return true;
    } else {
        Settings::where('key', $key)->update([
            'key' => $key,
            'value' => $value
        ]);
        return true;
    }
    return false;
}

function setEnvValue(array $values)
{

    $envFile = app()->environmentFilePath();
    $str = file_get_contents($envFile);

    if (count($values) > 0) {
        foreach ($values as $envKey => $envValue) {

            $str .= "\n";
            $keyPosition = strpos($str, "{$envKey}=");
            $endOfLinePosition = strpos($str, "\n", $keyPosition);
            $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
            if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                $str .= "{$envKey}={$envValue}\n";
            } else {
                $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
            }
        }
    }

    $str = substr($str, 0, -1);
    if (!file_put_contents($envFile, $str)) return false;
    return true;
}
