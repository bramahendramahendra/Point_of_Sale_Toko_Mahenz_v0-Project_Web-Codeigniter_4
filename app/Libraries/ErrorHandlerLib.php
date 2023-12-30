<?php namespace App\Libraries;

class ErrorHandlerLib {
    public function showError400($menu, $title, $button, $statusRedirect) {
        $data = [
            'judul' => $title,
            'subjudul' => '400 - Bad Request',
            'menu' => $menu,
            'submenu' => '',
            'page' => 'errors/error_400',
            'header' => 'Oops! Terjadi Kesalahan.',
            'body' => '
                <p>Kami tidak dapat memproses permintaan Anda karena terdapat kesalahan pada data yang diperlukan.</p>
                <p>Silahkan mengisi <a href="'. base_url($statusRedirect) .'">'.$button.'</a> terlebih dahulu dan pastikan semua informasi telah diisi dengan benar.</p>',
            'button' => ['link' => base_url($statusRedirect), 'text' => $button]
        ];
        return view('v_template', $data);
    }
}
