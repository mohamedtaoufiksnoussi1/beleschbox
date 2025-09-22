<div>
    <style>
        /* Login Interface Ultra-Moderne */
        .login-register-area {
            background: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 20px 0;
        }

        .login-container {
            position: relative;
            z-index: 2;
            max-width: 360px;
            margin: 0 auto;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(25px);
            border-radius: 20px;
            padding: 1.6rem 1.4rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.18), 
                        0 0 0 1px rgba(255, 255, 255, 0.25),
                        inset 0 1px 0 rgba(255, 255, 255, 0.35);
            border: 2px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
            transition: all 0.5s ease;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #009ee1 0%, #39cdc1 50%, #0077b3 100%);
            border-radius: 24px 24px 0 0;
        }

        .login-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 35px 80px rgba(0, 0, 0, 0.25), 
                        0 0 0 1px rgba(255, 255, 255, 0.4),
                        inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }

        .login-header {
            text-align: center;
            margin-bottom: 0.9rem;
        }

        .login-logo {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%);
            border-radius: 20px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 15px 35px rgba(0, 158, 225, 0.4),
                        inset 0 1px 0 rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
        }

        .login-logo::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        .login-logo i {
            font-size: 1.5rem;
            color: white;
            z-index: 2;
        }

        .login-title {
            font-size: 1.6rem;
            font-weight: 800;
            background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            letter-spacing: -0.02em;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .login-subtitle {
            color: #64748b;
            font-size: 0.95rem;
            font-weight: 500;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .form-group-modern {
            margin-bottom: 0.9rem;
            position: relative;
        }

        .form-group-modern .form-control {
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.8rem 0.9rem 0.8rem 2.6rem;
            font-size: 0.95rem;
            font-weight: 500;
            color: #333;
            transition: all 0.3s ease;
            backdrop-filter: blur(15px);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .form-group-modern .form-control:focus {
            border-color: #009ee1;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 0 0 4px rgba(0, 158, 225, 0.1),
                        inset 0 1px 0 rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            color: #333;
        }

        .form-group-modern .form-control::placeholder {
            color: #94a3b8;
            font-weight: 500;
        }

        .form-icon {
            position: absolute;
            left: 0.8rem;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 1rem;
            transition: all 0.3s ease;
            z-index: 3;
        }

        .form-group-modern:focus-within .form-icon {
            color: #009ee1;
            transform: translateY(-50%) scale(1.1);
        }

        .btn-login-modern {
            background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%);
            border: none;
            border-radius: 10px;
            padding: 0.85rem 1.4rem;
            font-size: 1rem;
            font-weight: 700;
            color: white;
            width: 100%;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 12px 28px rgba(0, 158, 225, 0.28),
                        inset 0 1px 0 rgba(255, 255, 255, 0.2);
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .btn-login-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-login-modern:hover::before {
            left: 100%;
        }

        .btn-login-modern:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 20px 45px rgba(0, 158, 225, 0.4),
                        inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .btn-login-modern:active {
            transform: translateY(-1px);
        }

        .alert-modern {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            backdrop-filter: blur(10px);
        }

        .alert-modern .alert-message {
            color: #dc2626;
            font-weight: 500;
        }

        .login-footer {
            text-align: center;
            margin-top: 1.1rem;
            padding-top: 1.1rem;
            border-top: 1px solid #e2e8f0;
        }

        .login-footer p {
            color: #64748b;
            font-size: 0.9rem;
            margin: 0;
        }

        .login-footer a {
            color: #009ee1;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-footer a:hover {
            color: #0077b3;
        }

        /* Animations d'entrée */
        .login-card {
            animation: slideInUp 0.6s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-register-area {
                min-height: 50vh;
                padding: 16px 0;
            }
            
            .login-card {
                margin: 0.8rem;
                padding: 1.2rem 1rem;
            }
            
            .login-title {
                font-size: 1.35rem;
            }
            
            .login-logo {
                width: 48px;
                height: 48px;
            }
            
            .login-logo i {
                font-size: 1.1rem;
            }
        }

        /* Classes de validation */
        .form-control.is-invalid {
            border-color: #dc2626;
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1);
        }

        .form-control.is-valid {
            border-color: #10b981;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        /* Bordure rouge pour les erreurs */
        .form-control.error-border {
            border-color: #dc2626 !important;
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1) !important;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        /* Supprimer les messages de validation du navigateur */
        .form-control:invalid {
            box-shadow: none !important;
        }

        .form-control:invalid:focus {
            box-shadow: 0 0 0 4px rgba(0, 158, 225, 0.1) !important;
        }

        /* Messages d'erreur personnalisés */
        .custom-error-message {
            margin-top: 8px;
            padding: 12px 16px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 8px;
            font-size: 14px;
            color: #dc2626;
            animation: slideDown 0.3s ease-out;
        }

        .error-text {
            font-weight: 500;
            line-height: 1.4;
        }

        /* Message d'erreur global */
        .global-error-message {
            margin-top: 20px;
            padding: 16px 20px;
            background: #fef2f2;
            border: 2px solid #fecaca;
            border-radius: 12px;
            animation: slideDown 0.3s ease-out;
        }

        .global-error-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .global-error-icon {
            font-size: 20px;
            flex-shrink: 0;
        }

        .global-error-text {
            font-size: 16px;
            font-weight: 600;
            color: #dc2626;
            line-height: 1.4;
        }

        /* Cacher l'icône du champ quand il y a une erreur */
        .form-group-modern.has-error .form-icon {
            display: none;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <script>
        // Variables globales pour les fonctions
        let emailInput, passwordInput, form;
        
        // Messages d'erreur en allemand
        const errorMessages = {
            email: {
                required: 'Bitte geben Sie Ihre E-Mail-Adresse ein.',
                invalid: 'Bitte geben Sie eine gültige E-Mail-Adresse ein.'
            },
            password: {
                required: 'Bitte geben Sie Ihr Passwort ein.',
                minLength: 'Bitte geben Sie Ihr Passwort ein.'
            }
        };
        
        // Fonction pour valider l'email
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
        
        // Fonction pour afficher l'erreur personnalisée
        function showCustomError(input, message) {
            console.log('Affichage erreur pour:', input.name || 'input', message);
            
            // Supprimer les erreurs existantes
            removeCustomError(input);
            
            // Créer l'élément d'erreur
            const errorDiv = document.createElement('div');
            errorDiv.className = 'custom-error-message';
            errorDiv.innerHTML = `<div class="error-text">${message}</div>`;
            
            // Insérer après le champ
            input.parentNode.appendChild(errorDiv);
            
            // Ajouter la classe d'erreur
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');
            // Masquer l'icône du champ
            input.parentNode.classList.add('has-error');
        }
        
        // Fonction pour supprimer l'erreur personnalisée
        function removeCustomError(input) {
            const existingError = input.parentNode.querySelector('.custom-error-message');
            if (existingError) {
                existingError.remove();
            }
            input.classList.remove('is-invalid');
            // Réafficher l'icône du champ
            input.parentNode.classList.remove('has-error');
        }
        
        // Fonction pour ajouter une bordure rouge
        function addRedBorder(input) {
            input.classList.add('error-border');
            console.log('Bordure rouge ajoutée à:', input.name || 'input');
        }
        
        // Fonction pour supprimer la bordure rouge
        function removeRedBorder(input) {
            input.classList.remove('error-border');
        }
        
        // Fonction pour afficher l'erreur globale
        function showGlobalError(errorCount) {
            console.log('Affichage erreur globale, count:', errorCount);
            // Ne pas afficher le message global générique.
            // On garde uniquement les erreurs sous les champs et l'erreur d'authentification.
            removeGlobalError();
            return;
        }
        
        // Fonction pour supprimer l'erreur globale
        function removeGlobalError() {
            const existingError = document.getElementById('global-error-message');
            if (existingError) {
                existingError.remove();
            }
        }
        
        // Afficher une erreur d'authentification (email/pwd incorrects)
        function showAuthError(message) {
            console.log('=== AFFICHAGE ERREUR AUTH ===', message);
            
            removeGlobalError();

            const errorDiv = document.createElement('div');
            errorDiv.id = 'global-error-message';
            errorDiv.className = 'global-error-message';
            errorDiv.innerHTML = `
                <div class="global-error-content">
                    <div class="global-error-icon">⚠️</div>
                    <div class="global-error-text">${message}</div>
                </div>
            `;

            // Insérer juste sous le bouton Anmelden
            insertErrorBelowSubmit(errorDiv);

            // Marquer les champs comme erronés
            if (emailInput) {
                showCustomError(emailInput, 'E-Mail oder Passwort falsch.');
                addRedBorder(emailInput);
            }
            if (passwordInput) {
                showCustomError(passwordInput, 'E-Mail oder Passwort falsch.');
                addRedBorder(passwordInput);
            }
        }

        // Helper: insérer une erreur sous le bouton Anmelden
        function insertErrorBelowSubmit(errorDiv) {
            const formEl = document.querySelector('form.contact-panel__form');
            if (!formEl) {
                console.log('Formulaire non trouvé pour insertion');
                return;
            }
            const submitBtn = formEl.querySelector('button[type="submit"]');
            if (submitBtn && submitBtn.parentNode) {
                // insérer après le conteneur du bouton
                const parentRow = submitBtn.closest('.col-12');
                if (parentRow && parentRow.parentNode) {
                    parentRow.parentNode.appendChild(errorDiv);
                } else {
                    submitBtn.parentNode.appendChild(errorDiv);
                }
            } else {
                // fallback: à la fin du formulaire
                formEl.appendChild(errorDiv);
            }
        }
        
        // Rechercher et transformer le message serveur
        function transformServerAlert() {
            console.log('=== RECHERCHE MESSAGE SERVEUR ===');
            
            const serverAlert = document.querySelector('.alert-modern .alert-message');
            if (serverAlert) {
                let text = serverAlert.textContent.trim();
                console.log('Message serveur trouvé:', text);
                
                const wrapper = serverAlert.closest('.alert-modern');
                if (wrapper) {
                    wrapper.style.display = 'none';
                    console.log('Message serveur masqué');
                }
                
                // Nettoyer le texte: retirer icônes/emojis et préfixes
                text = text.replace(/^[\u26A0-\u26FF\uFE0F\s:]+/g, '') // icônes/espaces/:
                           .replace(/^Anmeldefehler\s*:?\s*/i, '') // retirer libellé
                           .trim();
                
                // Toujours afficher un message propre en allemand sans icône
                const msg = 'E-Mail oder Passwort falsch.';
                showAuthError(msg);
            } else {
                console.log('Aucun message serveur trouvé');
            }
        }
        
        // Gestion d'erreur professionnelle en allemand
        function initLoginValidation() {
            console.log('=== INITIALISATION VALIDATION ===');
            
            emailInput = document.querySelector('input[type="email"]');
            passwordInput = document.querySelector('input[type="password"]');
            form = document.querySelector('form');
            
            console.log('Email input trouvé:', !!emailInput);
            console.log('Password input trouvé:', !!passwordInput);
            console.log('Form trouvé:', !!form);
            
            if (!emailInput || !passwordInput || !form) {
                console.log('Éléments non trouvés, retry dans 100ms');
                setTimeout(initLoginValidation, 100);
                return;
            }
            
            // Validation au clic sur le bouton (plus fiable que submit avec Livewire)
            const submitButton = document.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.addEventListener('click', function(e) {
                    console.log('=== BOUTON CLICKÉ - DÉBUT VALIDATION ===');
                    
                    let isValid = true;
                    let errorCount = 0;
                    
                    // Supprimer toutes les erreurs existantes
                    removeCustomError(emailInput);
                    removeCustomError(passwordInput);
                    removeGlobalError();
                    
                    // Validation email
                    const emailValue = emailInput.value.trim();
                    console.log('Email value:', emailValue);
                    
                    if (emailValue === '') {
                        console.log('Email vide - erreur');
                        showCustomError(emailInput, errorMessages.email.required);
                        addRedBorder(emailInput);
                        isValid = false;
                        errorCount++;
                    } else if (!validateEmail(emailValue)) {
                        console.log('Email invalide - erreur');
                        showCustomError(emailInput, errorMessages.email.invalid);
                        addRedBorder(emailInput);
                        isValid = false;
                        errorCount++;
                    }
                    
                    // Validation mot de passe
                    const passwordValue = passwordInput.value;
                    console.log('Password value length:', passwordValue.length);
                    
                    if (passwordValue === '') {
                        console.log('Password vide - erreur');
                        showCustomError(passwordInput, errorMessages.password.required);
                        addRedBorder(passwordInput);
                        isValid = false;
                        errorCount++;
                    } else if (passwordValue.length < 6) {
                        console.log('Password trop court - erreur');
                        showCustomError(passwordInput, errorMessages.password.minLength);
                        addRedBorder(passwordInput);
                        isValid = false;
                        errorCount++;
                    }
                    
                    console.log('isValid:', isValid, 'errorCount:', errorCount);
                    
                    // Afficher un message d'erreur global si nécessaire
                    if (!isValid) {
                        console.log('Prévention soumission et affichage erreurs');
                        e.preventDefault();
                        showGlobalError(errorCount);
                        
                        // Faire défiler vers la première erreur
                        const firstError = form.querySelector('.is-invalid');
                        if (firstError) {
                            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            firstError.focus();
                        }
                    } else {
                        console.log('Formulaire valide - soumission autorisée');
                        // Laisser Livewire gérer la soumission
                    }
                });
            }
            
            console.log('=== VALIDATION INITIALISÉE ===');

            // Vérifier s'il y a un message d'erreur serveur au chargement
            transformServerAlert();
        }
        
        // Initialiser quand le DOM est prêt
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initLoginValidation);
        } else {
            initLoginValidation();
        }

        // Hook Livewire pour détecter les changements
        document.addEventListener('livewire:load', function () {
            console.log('=== LIVEWIRE LOAD ===');
            
            // Vérifier immédiatement
            transformServerAlert();
            
            // Vérifier après chaque requête Livewire
            if (window.Livewire && Livewire.hook) {
                Livewire.hook('message.processed', function () {
                    console.log('=== LIVEWIRE MESSAGE PROCESSED ===');
                    setTimeout(transformServerAlert, 100); // Petit délai pour laisser le DOM se mettre à jour
                });
            }
        });
        
        // Vérifier périodiquement au cas où
        setInterval(transformServerAlert, 1000);
    </script>

    <!-- ========================  Login Ultra-Moderne =========================== -->
    <div class="login-register-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 ml-auto mr-auto">
                    <div class="login-container">
                    @if(session()->has('message'))
                                   <div class="alert alert-modern alert-dismissible" role="alert" style="display: none;">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <div class="alert-message">
                                           <strong>⚠️ Anmeldefehler :</strong> {{session('message')}}
                            </div>
                        </div>
                    @endif
                        
                        <div class="login-card">
                            <div class="login-header">
                                <div class="login-logo">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                                        <h1 class="login-title">Anmeldung</h1>
                                        <p class="login-subtitle">Zugang zu Ihrem persönlichen Bereich</p>
                            </div>

                        <form class="contact-panel__form" wire:submit.prevent="submit">
                            @csrf
                            <div class="row">
                                    <div class="col-12">
                                               <div class="form-group-modern">
                                                   <i class="fas fa-envelope form-icon"></i>
                                                   <input type="email" class="form-control" placeholder="E-Mail-Adresse" wire:model.debounce.1000ms="email" novalidate>
                                                   @error('email') <span class="text-danger mt-2 d-block">{{$message}}</span> @enderror
                                               </div>

                                               <div class="form-group-modern">
                                                   <i class="fas fa-lock form-icon"></i>
                                                   <input type="password" class="form-control" placeholder="Passwort" wire:model.debounce.1000ms="password" novalidate>
                                                   @error('password') <span class="text-danger mt-2 d-block">{{$message}}</span> @enderror
                                               </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-login-modern" wire:loading.attr="disabled">
                                            <span wire:loading.remove>Anmelden</span>
                                            <span wire:loading>
                                                <i class="fas fa-spinner fa-spin me-2"></i>Anmeldung...
                                            </span>
                                            <i class="fas fa-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="login-footer">
                                <p>Benötigen Sie Hilfe? <a href="{{route('contact')}}">Kontaktieren Sie unseren Support</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>