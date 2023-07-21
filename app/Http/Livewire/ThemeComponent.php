<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Request;
class ThemeComponent extends Component
{
    public $darkMode = false;
    public $isCompact = false;

    public function toggleDarkMode()
    {
        // dd('enter');
        $this->darkMode = !$this->darkMode;

        if ($this->darkMode) {
            // Activer le mode sombre
            setcookie('dark_mode', 'true', time() + (365 * 24 * 60 * 60), '/');

        } else {
            // Désactiver le mode sombre
            setcookie('dark_mode', 'false', time() + (365 * 24 * 60 * 60), '/');
        }
        $this->redirect('/');
        // $this->dispatchBrowserEvent('reload-page');
        // $this->refresh();
        // dd(request()->url());
        // $this->redirect(url()->current());
    }
    public function toggleIsCompact()
    {
        // dd('enter');
        $this->isCompact = !$this->isCompact;

        if ($this->isCompact) {
            // Activer le mode sombre
            setcookie('is_compact', 'true', time() + (365 * 24 * 60 * 60), '/');

        } else {
            // Désactiver le mode sombre
            setcookie('is_compact', 'false', time() + (365 * 24 * 60 * 60), '/');
        }
        // $this->redirect('/');
        // $this->dispatchBrowserEvent('reload-page');
        // $this->refresh();
        // dd(request()->url());
        // $this->redirect(url()->current());
    }

    public function mount()
    {
        // Vérifier si le cookie du mode sombre existe et le restaurer
        if (isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] === 'true') {
            $this->darkMode = true;

        }
        if (isset($_COOKIE['is_compact']) && $_COOKIE['is_compact'] === 'true') {
            $this->isCompact = true;

        }
    }

    // Le reste de votre code...
}

