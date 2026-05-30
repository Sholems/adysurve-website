<?php

namespace App\Http\Controllers;

class AcademyController extends Controller
{
    public function networkSecurity()
    {
        return $this->show('network-security');
    }

    public function cctvSecurity()
    {
        return $this->show('cctv-security');
    }

    public function solarRenewableEnergy()
    {
        return $this->show('solar-renewable-energy');
    }

    public function itEssentials()
    {
        return $this->show('it-essentials');
    }

    public function graphicDesignMedia()
    {
        return $this->show('graphic-design-media');
    }

    private function show(string $programKey)
    {
        $program = config("academy-programs.{$programKey}");

        abort_unless($program, 404);

        return view('academy.show', [
            'program' => $program,
            'metaTitle' => $program['meta_title'],
            'metaDescription' => $program['meta_description'],
        ]);
    }
}
