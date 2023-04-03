<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\User;


class UploadController extends Controller
{
	public function upload(){
		// $gambar = User::get();
        // return view('upload',['file' => $gambar]);
        return view('upload');
	}

	public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			// 'keterangan' => 'required',
		]);

		
		$file = $request->file('file');
		
		echo 'File Name: '.$file->getClientOriginalName();
		echo '<br>';
 
      	        // ekstensi file
		echo 'File Extension: '.$file->getClientOriginalExtension();
		echo '<br>';
 
      	        // real path
		echo 'File Real Path: '.$file->getRealPath();
		echo '<br>';
 
      	        // ukuran file
		echo 'File Size: '.$file->getSize();
		echo '<br>';
 
      	        // tipe mime
		echo 'File Mime Type: '.$file->getMimeType();


		
                // upload file
		$file->move($tujuan_upload,$file->getClientOriginalName());

		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
		]);
 
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data/image';
		// $file->move($tujuan_upload,$nama_file);
			$tes = 'tes.png';
		$keterangan->move($tujuan_upload,$tes);
 
		User::where('id','=',2)
		->update([
			'file' => $nama_file
		]);
 
	
		return redirect()->back();
	}

	public function uploadBaseJpg(Request $request,$id)
	{
		$image = $request->foto;  // your base64 encoded

        $image = str_replace('data:image/jpg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = str_random(10).'.'.'jpg';
		\File::put(public_path(). '/data/images/' . $imageName, base64_decode($image));

		$user = User::find($id);
		$user->foto=$image;
		$user->file=$imageName;
        
		$user->save();
		if($user->save())
        {
                $result['success'] = 1;
                $result['message'] = 'success';
            echo json_encode($user);
        }else{

        $message = ['message'=>'gagal'];
            echo json_encode($message);
        }
		// ->update([
		// 	'file' => $imageName,
		// 	'foto' => $request->foto
		// ]);
	}
	public function uploadBasePNG(Request $request,$id)
	{
		// $id = $request->id; 
		$image = $request->foto;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = str_random(10).'.'.'png';
        \File::put(public_path(). '/data/images/' . $imageName, base64_decode($image));
		User::where('id','=',$id)
		->update([
			'foto' => $image
		]);
	}

	public function upBaseAll(Request $request)
	{
		$image = $request->keterangan; // image base64 encoded
		// $image_extension = 
		
		$img = explode(',', $image);
        $ini =substr($img[0], 11);
		$type = explode(';', $ini);
		$extension = explode('/', mime_content_type($image))[1];
// echo $type[0];
// $image = $request->input('image');  // your base64 encoded
$image = str_replace('data:image/png;base64,', '', $image);
$image = str_replace(' ', '+', $image);
$imageName = str_random(10).'.'.$extension;
\File::put(public_path(). '/imagess/' . $imageName, base64_decode($image));

		// preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension
		// $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part
		// $image = str_replace(' ', '+', $image);
		// $imageName = 'image_' . time() . '.' . $type[1]; //generating unique file name;
		// // Storage::disk('public')->put($imageName,base64_decode($image));
        // \File::put(public_path(). '/data/image/' . $imageName, base64_decode($image));
	}
}