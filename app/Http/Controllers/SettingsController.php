<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{

    public function index()
    {
        return view('admin.settings.index');
    }

    public function update(Request $request)
    {

        if ($request->get('postType') == 'smtp') {

            $validated = $request->validate([
                'smtp_mail_host' => 'required|string',
                'smtp_mail_port' => 'required|string',
                'smtp_mail_username' => 'required|string',
                'smtp_mail_password' => 'required|string',
                'smtp_mail_encryption' => 'required|string'
            ]);

            updateSettings('smtp_mail_mailer', $request->smtp_mail_mailer);
            updateSettings('smtp_mail_host', $request->smtp_mail_host);
            updateSettings('smtp_mail_port', $request->smtp_mail_port);
            updateSettings('smtp_mail_username', $request->smtp_mail_username);
            updateSettings('smtp_mail_password', $request->smtp_mail_password);
            updateSettings('smtp_mail_encryption', $request->smtp_mail_encryption);

            setEnvValue([
                'MAIL_DRIVER' => $request->smtp_mail_mailer,
                'MAIL_HOST' => $request->smtp_mail_host,
                'MAIL_PORT' => $request->smtp_mail_port,
                'MAIL_USERNAME' => $request->smtp_mail_username,
                'MAIL_PASSWORD' => '"' . $request->smtp_mail_password . '"',
                'MAIL_ENCRYPTION' => $request->smtp_mail_encryption,
                'MAIL_FROM_ADDRESS' => $request->smtp_mail_username,
            ]);

            return redirect()->back()->withSuccess('Alterações realizadas com sucesso!');
        }


        if ($request->get('postType') == 'company') {

            $validated = $request->validate([
                'company_name' => 'required|string|max:255|min:8',
                'company_description' => 'required|string|max:255|min:8',
                'company_logo' => 'nullable|image',
            ]);

            if ($request->file('company_logo')) {

                if (Storage::exists(Settings('company_logo'))) {
                    Storage::delete(Settings('company_logo'));
                }

                $imageUpload = $request->file('company_logo')->store('uploads');
                updateSettings('company_logo', $imageUpload);
            }

            updateSettings('company_name', $request->company_name);
            updateSettings('company_description', $request->company_description);

            return redirect()->back()->withSuccess('Alterações realizadas com sucesso!');
        }
    }
}
