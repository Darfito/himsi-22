<?php

namespace App\Http\Livewire;

use App\Form;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAlumni extends Component
{
    use WithPagination;

    public $alumni;
    public $search;
    public $angkatan;

    //inisialisasi variable alumni
    //dijadikan associative array biar gampang sorting nya
    public function mount(){
        $data = Form::with([
            'pertanyaan', 'penjawab', 'penjawab.jawaban',
            'penjawab.jawaban.pertanyaan'
            ])->where('id', 70)->first();

        $data->pertanyaan = $data->pertanyaan->sortBy('sorting')->all();
        $data['inputdeadline'] = join("T", explode(" ", $data->deadline));

        $table = [];

        foreach($data->penjawab as $index=>$entry){

            $array = [
                'id' => $entry->id,
                'nama' => $entry->jawaban->where('pertanyaan_id', '279')->first()->jawaban,
                'email' => $entry->jawaban->where('pertanyaan_id', '281')->first()->jawaban,
                'linkedin' => $entry->jawaban->where('pertanyaan_id', '282')->first()->jawaban,
                'pekerjaan' => $entry->jawaban->where('pertanyaan_id', '299')->first()->jawaban,
                'telp' => $entry->jawaban->where('pertanyaan_id', '343')->first()->jawaban,
                'perusahaan' => $entry->jawaban->where('pertanyaan_id', '294')->first()->jawaban,
                'angkatan' => $entry->jawaban->where('pertanyaan_id', '342')->first()->jawaban
            ];
            array_push($table, $array);
        };

        $this->alumni = $table;
    }

    public function updatingSearch()

    {

        $this->resetPage();

    }

    public function updatingAngkatan()

    {

        $this->resetPage();

    }

    public function render()
    {


        //convert alumni ke collection
        $data = collect($this->alumni);

        //jika search memiliki value
        //search kolom 'nama' dan kolom 'pekerjaan'
        if ($this->search != null){

            $search = $this->search;

            $result = $data->filter(function ($item) use ($search) {
                return false !== stripos($item["nama"], $search);
            });
            $result2 = $data->filter(function ($item) use ($search) {
                return false !== stripos($item["pekerjaan"], $search);
            });

            $merged = $result->merge($result2)->unique();

            return view('livewire.show-alumni', [
                'alumnis' => $merged->where('angkatan', ($this->angkatan == "") ? "!=" : "=", $this->angkatan)->paginate(5),
            ]);
        }

        return view('livewire.show-alumni', [
            'alumnis' => $data->where('angkatan', ($this->angkatan == "") ? "!=" : "=", $this->angkatan)->paginate(5),
        ]);
    }
}