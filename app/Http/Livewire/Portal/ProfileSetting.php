<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;
use App\Rules\CurrentPasswordCheckRule;
use Illuminate\Support\Facades\Hash;

class ProfileSetting extends Component
{
    use WithFileUploads;
    public $first_name;
    public $last_name;
    public $email;
    public $phone_number;
    public $position;
    public $matricule;
    public $current_password;
    public $password;
    public $password_confirmation;
    public $signature;
    public $preferred_language;

    public function mount()
    {
        $this->first_name = auth()->user()->first_name;
        $this->last_name = auth()->user()->last_name;
        $this->email = auth()->user()->email;
        $this->matricule = auth()->user()->matricule;
        $this->position = auth()->user()->position;
        $this->phone_number = auth()->user()->phone_number;
    }

    public function updateProfile()
    {
        if (!Gate::allows('profile-update')) {
            return abort(401);
        }
        auth()->user()->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'position' => $this->position,
            'matricule' => $this->matricule,
            'preferred_language' => $this->preferred_language,
        ]);

        $this->refresh(__('Profil mis à jour avec succès!'));
    }

    public function saveSignature()
    {
        // Vérifie si l'utilisateur est autorisé à mettre à jour le profil
        if (!Gate::allows('profile-update')) {
            return abort(401);
        }

        // Vérifie si une signature est présente
        if ($this->signature) {
            // Vérifie si l'utilisateur a déjà une signature
            if (!empty(auth()->user()->signature_path)) {
                // Vous pouvez ajouter ici du code pour supprimer l'ancienne signature si nécessaire
            }

            // Enregistre le chemin de la nouvelle signature dans la base de données
            auth()->user()->update([
                'signature_path' => $this->signature->store('signatures', 'public')
            ]);
        }

        // Rafraîchit la page avec un message de succès
        $this->refresh(__('Signature enregistrée avec succès!'));
    }


    public function passwordReset()
    {
        $this->validate([
            'current_password' => ['required', new CurrentPasswordCheckRule],
            'password' => 'required|min:8|different:current_password|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        auth()->user()->update(['password' => Hash::make($this->password)]);

        $this->reset(['current_password', 'password', 'password_confirmation']);

        $this->refresh(__('Password reseted successfully!'));
    }
    public function refresh($message)
    {
        session()->flash('message', $message);
    }
    public function render()
    {
        return view('livewire.portal.profile-setting')->layout('components.layouts.dashboard');
    }
}
