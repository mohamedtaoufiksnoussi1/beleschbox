<div>
    @livewire('frontend.includes.header')
    <!-- ========================
          page title
       =========================== -->

       <style>
         /* Page de succès ultra-moderne */
         .success-page {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
         }
         
         .success-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 80vh;
         }
         
         .success-card {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 158, 225, 0.15);
            display: inline-block;
            margin: 0 auto;
            text-align: center;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0, 158, 225, 0.1);
            max-width: 500px;
            width: 100%;
         }
         
         .success-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%);
         }
         
         .success-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%);
            border-radius: 50%;
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 158, 225, 0.3);
         }
         
         .success-icon::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%);
            border-radius: 50%;
            opacity: 0.2;
            animation: pulse 2s infinite;
         }
         
         @keyframes pulse {
            0% { transform: scale(1); opacity: 0.2; }
            50% { transform: scale(1.1); opacity: 0.1; }
            100% { transform: scale(1); opacity: 0.2; }
         }
         
         .success-checkmark {
            color: white;
            font-size: 60px;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
         }
         
         .success-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.02em;
         }
         
         .success-message {
            font-size: 1.1rem;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 2rem;
            text-align: center;
         }
         
         .success-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
         }
         
         .btn-success-custom {
            background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 158, 225, 0.3);
         }
         
         .btn-success-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 158, 225, 0.4);
            color: white;
            text-decoration: none;
         }
         
         .btn-outline-custom {
            background: transparent;
            color: #009ee1;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid #009ee1;
         }
         
         .btn-outline-custom:hover {
            background: #009ee1;
            color: white;
            transform: translateY(-2px);
            text-decoration: none;
         }
         
         /* Responsive */
         @media (max-width: 768px) {
            .success-card {
                margin: 1rem;
                padding: 2rem;
            }
            
            .success-title {
                font-size: 2rem;
            }
            
            .success-actions {
                flex-direction: column;
                align-items: center;
            }
         }
      </style>
    <!-- Page de succès moderne -->
    <div class="success-page">
        <div class="container">
            <div class="success-container">
                <div class="success-card">
                <div class="success-icon">
                    <span class="success-checkmark">✓</span>
                </div>
                <h1 class="success-title">Erfolgreich!</h1>
                <p class="success-message">
                    Wir haben Ihre Bestellanfrage erhalten und werden uns in Kürze bei Ihnen melden!<br>
                    Vielen Dank für Ihr Vertrauen in BeleschBox.
                </p>
                <div class="success-actions">
                    <a href="{{route('home')}}" class="btn-success-custom">
                        🏠 Zur Startseite
                    </a>
                    <a href="{{route('assemble')}}" class="btn-outline-custom">
                        📦 Neue Box zusammenstellen
                    </a>
                    <a href="{{route('contact')}}" class="btn-outline-custom">
                        📞 Kontakt
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>



    @livewire('frontend.includes.footer')
</div>