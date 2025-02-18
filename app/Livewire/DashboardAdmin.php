<?php 
namespace App\Livewire;

use Livewire\Component;
use App\Models\Formation;

class DashboardAdmin extends Component
{
    public $section = 'formationsAvailable';
    public $title, $description, $user_id;
    public $formations = [];

    protected $listeners = ['changeSection' => 'changeSection'];

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'user_id' => 'required|integer|exists:users,id',
    ];

    public function changeSection($s)
    {
        if ($s != 'formationsAvailable') {
            $this->formations = [];
        } else {
            $this->loadFormations(); 
        }

        $this->section = $s;
    }

    public function loadFormations()
    {
        $this->formations = Formation::all();
    }

    public function mount()
    {
        $this->loadFormations(); 
    }

    public function creer_formation()
    {
        $this->validate();

        Formation::create([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => $this->user_id,
        ]);

        $this->reset(); 
        $this->loadFormations(); 
    }

    public function render()
    {
        return view('livewire.dashboard-admin');
    }
}
