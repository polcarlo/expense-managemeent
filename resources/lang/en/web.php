<?php

return [
    'activity' => ':model has been :action',

    'form' => [
        'success_create' => 'Successfully Created.',
        'success_update' => 'Successfully Updated.',
        'success_delete' => 'Successfully Deleted.',

        'failed_create' => 'Failed to create, Please try again.',
        'failed_update' => 'Failed to update, Please try again.',
        'failed_delete' => 'Failed to delete, Please try again.',

        'failed_upload' => 'Failed to upload, Please try again.',
        'invalid_upload' => 'Invalid upload file / format.',

        'failed_uploadtype' => 'The uploadfile must be a file of type: .XLS, .CSV',
        'password' => 'Password Format:<br>
                Should have At least one Uppercase letter. <br>
                At least one Lower case letter. <br>
                At least one numeric value. <br>
                At least one special character. <br>
                Must be more than 8 characters long.',

        'password_regex' => 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
     ],
];
