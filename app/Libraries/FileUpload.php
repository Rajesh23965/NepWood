<?php

namespace App\Libraries;

use CodeIgniter\Validation\Exceptions\ValidationException;

class FileUpload
{
    protected $request;
    protected $validation;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->validation = \Config\Services::validation();
    }

    public function upload($fieldName, $allowedTypes)
    {
        // Ensure $allowedTypes is a string
        if (is_array($allowedTypes)) {
            $allowedTypes = implode(',', $allowedTypes);
        }

        // Set validation rules
        $this->validation->setRules([
            $fieldName => [
                'label' => 'File',
                'rules' => 'uploaded[' . $fieldName . ']|ext_in[' . $fieldName . ',' . $allowedTypes . ']|max_size[' . $fieldName . ',1024000]' // 100MB max size
            ]
        ]);

        // Check if the validation fails
        if (!$this->validation->withRequest($this->request)->run()) {
            $errors = $this->validation->getErrors();

            // Log errors for debugging
            error_log('Validation errors: ' . print_r($errors, true));

            // die;

            // Determine specific error
            if (isset($errors[$fieldName])) {
                if (strpos($errors[$fieldName], 'ext_in') !== false) {
                    return 0; // Invalid file type
                } elseif (strpos($errors[$fieldName], 'max_size') !== false) {
                    return 1; // File size exceeds limit
                }
            }
            throw new ValidationException(implode(", ", $errors));
        }

        // Proceed with file upload
        if ($file = $this->request->getFile($fieldName)) {
            if ($file->isValid() && !$file->hasMoved()) {
                // Log the MIME type for debugging
                error_log('Uploaded file MIME type: ' . $file->getClientMimeType());

                $newName = $file->getRandomName();
                $file->move(FCPATH . 'assets/uploads/', $newName);
                return $newName;
            } else {
                throw new \RuntimeException('File upload failed: ' . $file->getErrorString());
            }
        }

        return null;
    }
}
