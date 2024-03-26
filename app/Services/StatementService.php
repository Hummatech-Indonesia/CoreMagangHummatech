<?php

namespace App\Services;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreSelfStatement;
use App\Http\Requests\StoreParentStatement;



class StatementService
{
    use UploadTrait;

    /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param StoreSaleRequest $request
     *
     * @return array|bool
     */
    public function self(StoreSelfStatement $request): array|bool
    {

        $data = $request->validated();
        $dompdf = new Dompdf();
        $options = new Options();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('tempDir', storage_path());
        $options->set('chroot', base_path());
        $dompdf->setOptions($options);

        $combinedHtml = '';

        $html = view('desain_pdf.self-statement', compact('data'));

        $combinedHtml .= $html;

        $dompdf->loadHtml($combinedHtml);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $output = $dompdf->output();



        return ['output' => $output, 'filename' => 'self-statement.pdf'];
    }

    /**
     * Handle update data event to models.
     *
     * @param Sale $sale
     * @param UpdateSaleRequest $request
     *
     * @return array|bool
     */
    public function parent(StoreParentStatement $request): array|bool
    {
        $data = $request->validated();

        $dompdf = new Dompdf();
        $options = new Options();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('tempDir', storage_path());
        $options->set('chroot', base_path());
        $dompdf->setOptions($options);

        $combinedHtml = '';



        $html = view('desain_pdf.parent-statement', compact('data'));

        $combinedHtml .= $html;

        $dompdf->loadHtml($combinedHtml);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $output = $dompdf->output();

        return ['output' => $output, 'filename' => 'parent-statement.pdf'];
    }
}
