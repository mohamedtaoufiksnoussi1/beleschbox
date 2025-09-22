<?php

namespace App\Http\Livewire\Frontend;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Assemble extends Component
{
    public $productId;
    public $customer_sess;
	public $steps;
    public $mode = 'package'; // 'package' ou 'custom'
    
    protected $listeners = ['switchToCustomMode'];
    public function render()
    {
        // Ne pas charger les données de session par défaut
        // Le formulaire sera vide jusqu'à ce qu'une recherche réussie soit effectuée
        $data['customer_sess'] = null;
        $data['customerData'] = null;
        $data['emailFound'] = false;
        
        // Vérifier s'il y a des données de client dans la session Customer
        if (Session::has('Customer')) {
            $data['customerData'] = Session::get('Customer');
            $data['emailFound'] = true;
            
            // Log pour débogage
            \Log::info('=== DEBUG ASSEMBLE COMPONENT - Customer Session ===');
            \Log::info('Customer data found in session:', $data['customerData']->toArray());
            \Log::info('Email found: ' . ($data['emailFound'] ? 'true' : 'false'));
            \Log::info('Pflegegrad value: ' . ($data['customerData']->pflegegrad ?? 'NULL'));
            \Log::info('Insurance_type value: ' . ($data['customerData']->insurance_type ?? 'NULL'));
            \Log::info('All customer attributes: ' . json_encode($data['customerData']->getAttributes()));
        }
        // Vérifier s'il y a des données dans personalData (processus de commande)
        elseif (Session::has('personalData')) {
            $personalData = Session::get('personalData');
            if (is_array($personalData) && count($personalData) > 0) {
                // Convertir les données personalData en objet pour compatibilité
                $data['customerData'] = (object) $personalData[0];
                $data['emailFound'] = true;
                
                // Log pour débogage
                \Log::info('=== DEBUG ASSEMBLE COMPONENT - PersonalData Session ===');
                \Log::info('PersonalData found in session:', $personalData[0]);
                \Log::info('Email found: ' . ($data['emailFound'] ? 'true' : 'false'));
                \Log::info('Pflegegrad value: ' . ($data['customerData']->pflegegrad ?? 'NULL'));
                \Log::info('Insurance_type value: ' . ($data['customerData']->insurance_type ?? 'NULL'));
                \Log::info('All personalData attributes: ' . json_encode($personalData[0]));
            }
        } else {
            \Log::info('=== DEBUG ASSEMBLE COMPONENT ===');
            \Log::info('No customer data or personalData in session');
            \Log::info('All session keys:', array_keys(Session::all()));
            \Log::info('Session has personalData: ' . (Session::has('personalData') ? 'true' : 'false'));
            \Log::info('Session has Customer: ' . (Session::has('Customer') ? 'true' : 'false'));
            if (Session::has('personalData')) {
                \Log::info('PersonalData content:', Session::get('personalData'));
            }
        }
        
        // Passer les données du package si disponible
        if (Session::has('package_data')) {
            $data['package_data'] = Session::get('package_data');
        }
        
        // Déterminer le mode initial
        if (Session::has('package_data')) {
            $this->mode = 'package';
        } else {
            $this->mode = 'custom';
        }
        
        // Vérifier si le paramètre mode est dans l'URL
        if (request()->has('mode') && request()->get('mode') === 'custom') {
            $this->mode = 'custom';
        }
        
        // Passer le mode à la vue
        $data['mode'] = $this->mode;
        
        return view('livewire.frontend.assemble')->with($data);
    }

    public function getProduct($productId)
    {

    }
    
    public function switchToCustomMode()
    {
        $this->mode = 'custom';
        // Marquer dans la session que c'est maintenant en mode custom
        Session::put('assemble_mode', 'custom');
        
        // Log pour débogage
        \Log::info('=== MODE SWITCHED TO CUSTOM ===');
        \Log::info('User switched from package mode to custom mode');
        
        // Forcer le re-render du composant
        $this->render();
    }
}
