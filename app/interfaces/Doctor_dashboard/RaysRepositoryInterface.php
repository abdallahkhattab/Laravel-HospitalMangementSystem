<?php

namespace App\interfaces\Doctor_dashboard;

interface RaysRepositoryInterface {

    public function store($request);

    public function update($request,$ray);

    public function destroy($id);

}