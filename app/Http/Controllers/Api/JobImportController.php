<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;

class JobImportController extends Controller
{
    public function store(Request $request)
    {
        $jobs = $request->json()->all();

        if (!is_array($jobs)) {
            return response()->json([
                'message' => 'Invalid jobs data.'
            ], 422);
        }

        $imported = 0;
        $skipped = 0;

        foreach ($jobs as $jobData) {

            if (empty($jobData['title']) || empty($jobData['url']) || empty($jobData['source_id'])) {
                $skipped++;
                continue;
            }

            $job = JobPost::firstOrCreate(
                ['url' => $jobData['url']],
                [
                    'title' => $jobData['title'],
                    'category' => $jobData['category'] ?? null,
                    'company' => $jobData['company'] ?? null,
                    'location' => $jobData['location'] ?? null,
                    'description' => $jobData['description'] ?? null,
                    'source_id' => $jobData['source_id'] ?? null,
                    'extracted_data' => $jobData['extracted_data'] ?? null,
                ]
            );

            if ($job->wasRecentlyCreated) {
                $imported++;
            } else {
                $skipped++;
            }
        }

        return response()->json([
            'message' => 'Jobs imported successfully.',
            'imported' => $imported,
            'skipped' => $skipped,
        ]);
    }
}
