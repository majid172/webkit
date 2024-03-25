<?php

namespace App\Traits;

trait FileInfo
{

    /*
    |--------------------------------------------------------------------------
    | File Information
    |--------------------------------------------------------------------------
    |
    | This trait basically contain the path of files and size of images.
    | All information are stored as an array. Developer will be able to access
    | this info as method and property using FileManager class.
    |
    */

    public function fileInfo(){
        $data['withdrawVerify'] = [
            'path'=>'assets/images/verify/withdraw'
        ];
        $data['depositVerify'] = [
            'path'      =>'assets/images/verify/deposit'
        ];
        $data['verify'] = [
            'path'      =>'assets/verify'
        ];
        $data['default'] = [
            'path'      => 'assets/images/default.png',
        ];
        $data['withdrawMethod'] = [
            'path'      => 'assets/images/withdraw/method',
            'size'      => '800x800',
        ];
        $data['ticket'] = [
            'path'      => 'assets/support',
        ];
        $data['logoIcon'] = [
            'path'      => 'assets/images/logoIcon',
        ];
        $data['favicon'] = [
            'size'      => '128x128',
        ];
        $data['extensions'] = [
            'path'      => 'assets/images/extensions',
            'size'      => '36x36',
        ];
        $data['seo'] = [
            'path'      => 'assets/images/seo',
            'size'      => '1180x600',
        ];
        $data['userProfile'] = [
            'path'      =>'assets/images/user/profile',
            'size'      =>'80x80',
        ];
        $data['automaticGateway'] = [
            'path'      =>'assets/images/admin/automatic/gateway',
            'size'      =>'70x70',
        ];
        $data['instructor'] =[
            'path' => 'assets/images/instructor',
            'size' => '500x500',
        ];
        $data['adminProfile'] = [
            'path'      =>'assets/admin/images/profile',
            'size'      =>'400x400',
        ];
        $data['frontend']  = [
            'path'      =>'assets/images/frontend',
        ];
        $data['category'] = [
            'path' => 'assets/images/category',
            'size' => '600x400',
        ];
        $data['categoryImage']= [
            'path'  => 'assets/images/frontend',
            'size'  => '416x318',
        ];
        $data['course']=[
            'path' => 'assets/images/frontend',
            'size' => '600x400',
        ];
        $data['episode'] = [
            'path' => 'assets/images/episode',
        ];

        return $data;
	}

}
