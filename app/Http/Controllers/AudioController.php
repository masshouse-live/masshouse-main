<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function streamAudio(Request $request, $filename)
    {
        $path = storage_path('app/public/audio/' . $filename);

        if (!file_exists($path)) {
            abort(404); // File not found
        }

        $fileSize = filesize($path);
        $headers = [
            'Content-Type' => 'audio/mpeg', // Adjust based on file type
        ];

        // Handle range requests
        if ($request->hasHeader('Range')) {
            $range = $request->header('Range');
            $range = str_replace('bytes=', '', $range);
            [$start, $end] = explode('-', $range);

            if ($end === '') {
                $end = $fileSize - 1;
            }

            $start = intval($start);
            $end = intval($end);

            if ($start > $end || $start >= $fileSize || $end >= $fileSize) {
                return response()->json(['error' => 'Invalid range'], 416);
            }

            $length = $end - $start + 1;

            // Set response headers
            $headers['Content-Range'] = "bytes $start-$end/$fileSize";
            $headers['Content-Length'] = $length;
            return response()->file($path, $headers)->setStatusCode(206); // Partial content
        }

        // If no range is requested, serve the whole file
        $headers['Content-Length'] = $fileSize;
        return response()->file($path, $headers);
    }
}
