<?php

// FileUploadController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName(); // veya istediğiniz bir dosya adı

            // Hedef dizini kontrol et ve yoksa oluştur
            $targetDirectory = public_path('uploads');
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0755, true);
            }

            // Dosyayı hedef dizine taşı
            $file->move($targetDirectory, $fileName);

            // Dosyanın yeni yolu
            $filePath = 'uploads/' . $fileName;


            $success = true;
            $message = 'File uploaded successfully.';
        } else {
            // Dosya yüklenmediğinde uygun bir mesaj ver
            $success = false;
            $message = 'No file uploaded.';
        }

        // Sonuçları geri dön
        return response()->json([
            'success' => $success,
            'message' => $message,
            'file_name' => $fileName,
            'path' => $filePath ?? null, // Eğer dosya yoksa null olarak ayarla
        ]);

    }
}
