<div>
    <style>
        /* Styles modernes inspirés de l'admin mais adaptés pour l'utilisateur */
        .user-orders-container {
            background: linear-gradient(135deg, #f8f9fc 0%, #e3f2fd 100%);
            min-height: 100vh;
            padding: 1rem 0; /* réduit */
        }
        
        .orders-card {
            background: white;
            border-radius: 12px; /* légèrement plus compact */
            box-shadow: 0 6px 24px rgba(0, 158, 225, 0.1);
            border: none;
            overflow: hidden;
            margin-bottom: 0.75rem; /* réduit */
        }
        
        .orders-header {
            background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%);
            color: white;
            padding: 1.5rem 2rem;
            margin: 0;
        }
        
        .orders-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .search-container {
            padding: 0.75rem 1rem; /* réduit */
            background: #f8f9fc;
            border-bottom: 1px solid #e9ecef;
        }
        
        .search-input {
            border: 2px solid #e9ecef;
            border-radius: 20px; /* plus compact */
            padding: 0.55rem 1rem; /* réduit */
            font-size: 0.9rem;
            transition: all 0.3s ease;
            background: white;
        }
        
        .search-input:focus {
            border-color: #009ee1;
            box-shadow: 0 0 0 0.2rem rgba(0, 158, 225, 0.25);
            outline: none;
        }
        
        .orders-table {
            margin: 0;
        }
        
        .orders-table thead th {
            background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%);
            color: white;
            font-weight: 600;
            font-size: 0.85rem; /* réduit */
            padding: 0.8rem; /* réduit */
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .orders-table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #f1f3f4;
        }
        
        .orders-table tbody tr:hover {
            background: linear-gradient(135deg, rgba(0, 158, 225, 0.05) 0%, rgba(57, 205, 193, 0.05) 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0, 158, 225, 0.1);
        }
        
        .orders-table tbody td {
            padding: 0.75rem; /* réduit */
            vertical-align: middle;
            font-size: 0.9rem;
            color: #2d3748;
        }
        
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: 2px solid;
        }
        
        .status-pending {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            color: #856404;
            border-color: #ffc107;
        }
        
        .status-accepted {
            background: linear-gradient(135deg, #cce5ff 0%, #74b9ff 100%);
            color: #004085;
            border-color: #007bff;
        }
        
        .status-transit {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            color: #856404;
            border-color: #ffc107;
        }
        
        .status-delivered {
            background: linear-gradient(135deg, #d4edda 0%, #00b894 100%);
            color: #155724;
            border-color: #28a745;
        }
        
        .status-rejected {
            background: linear-gradient(135deg, #f8d7da 0%, #e17055 100%);
            color: #721c24;
            border-color: #dc3545;
        }
        
        .type-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .type-package {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            color: #856404;
        }
        
        .type-product {
            background: linear-gradient(135deg, #cce5ff 0%, #74b9ff 100%);
            color: #004085;
        }
        
        .action-btn {
            background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%);
            border: none;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .action-btn:hover {
            background: linear-gradient(135deg, #0088cc 0%, #2fb8b0 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 158, 225, 0.3);
        }
        
        .sort:hover {
            cursor: pointer;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }
        
        .no-orders {
            text-align: center;
            padding: 2rem; /* réduit */
            color: #6c757d;
        }
        
        .no-orders i {
            font-size: 3rem;
            color: #009ee1;
            margin-bottom: 1rem;
        }
        
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }
        
        .modal-header {
            background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%);
            color: white;
            border-radius: 15px 15px 0 0;
            border: none;
        }
        
        .modal-title {
            font-weight: 700;
        }
        
        .btn-close {
            filter: brightness(0) invert(1);
        }
        
        .product-detail-row {
            border-bottom: 1px solid #f1f3f4;
            padding: 1rem 0;
        }
        
        .product-detail-row:last-child {
            border-bottom: none;
        }
        
        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        @media (max-width: 768px) {
            .orders-table {
                font-size: 0.8rem;
            }
            
            .orders-table thead th,
            .orders-table tbody td {
                padding: 0.5rem;
            }
            
            .search-container {
                padding: 1rem;
            }
        }
    </style>

    <!-- Script JavaScript global pour les fonctions PDF -->
    <script>
    // Variables globales pour stocker les données de commande
    let currentOrderId = null;
    let currentOrderData = null;

    // Télécharge le PDF avec la même logique que l'admin
    window.downloadOrderPdf = async function() {
        console.log('downloadOrderPdf called with currentOrderId:', currentOrderId);
        
        if (!currentOrderId) {
            alert('Keine Bestellung ausgewählt.');
            return;
        }

        console.log('Fetching order data for orderId:', currentOrderId);

        // Récupérer les données de la commande d'abord
        await fetch('/generate-order-data', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ orderId: currentOrderId })
        })
        .then(response => {
            console.log('Response received:', response);
            return response.json();
        })
        .then(async data => {
            console.log('=== DEBUG FETCH RESPONSE ===');
            console.log('Data received:', data);
            console.log('Data type:', typeof data);
            console.log('Data keys:', Object.keys(data || {}));
            console.log('data.success:', data.success);
            console.log('data.userData:', data.userData);
            console.log('data.cartData:', data.cartData);
            console.log('data.signatureData:', data.signatureData);
            
            if (data && data.success && data.orderData) {
                console.log('=== CALLING updatePDF1DataUser ===');
                console.log('Calling updatePDF1DataUser with orderData:', data.orderData);
                
                // Utiliser la même approche que l'admin
                await updatePDF1DataUser(data.orderData);
                
                // Laisser le DOM finir de peindre
                await new Promise(requestAnimationFrame);
                
                // Vérifier que printableArea existe
                const printableArea = document.getElementById('printableArea');
                if (!printableArea) {
                    console.error('printableArea not found');
                    alert('PDF-Bereich nicht gefunden.');
                    return;
                }
                
                var printContents = printableArea.innerHTML;
                console.log('Print contents length:', printContents.length);
                
                // Créer une nouvelle fenêtre pour l'impression
                var printWindow = window.open('', '_blank');
                printWindow.document.write(`
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <title>Bestellung PDF</title>
                        <style>
                            body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
                            @media print { body { margin: 0; } }
                        </style>
                    </head>
                    <body>
                        ${printContents}
                    </body>
                    </html>
                `);
                printWindow.document.close();
                printWindow.print();
                
                console.log('PDF generation completed successfully!');
            } else {
                console.error('Data not successful:', data);
                alert('Daten konnten nicht abgerufen werden: ' + (data.error || 'Unbekannter Fehler'));
            }
        })
        .catch(error => {
            console.error('Error in downloadOrderPdf:', error);
            alert('Fehler beim Abrufen der Bestelldaten: ' + error.message);
        });
    };

    // Fonction pour mettre à jour les données PDF (même logique que l'admin)
    async function updatePDF1DataUser(orderData) {
        console.log('=== updatePDF1DataUser called ===');
        console.log('Order data received:', orderData);
        
        const userData = orderData.userData || {};
        const cartData = orderData.cartData || {};
        const signatureData = orderData.signatureData || {};
        
        console.log('UserData:', userData);
        console.log('CartData:', cartData);
        console.log('SignatureData:', signatureData);
        
        // Remplir les informations personnelles
        console.log('Filling personal data:', userData);
        
        // Informations personnelles
        const personalDataElements = {
            'first_name_pd': userData.first_name || '',
            'last_name_pd': userData.last_name || '',
            'street_pd': userData.street || '',
            'mobile_pd': userData.phone || '',
            'zip_pd': userData.zip || '',
            'city_pd': userData.city || '',
            'email_pd': userData.email || '',
            'dob_pd': userData.dob || '',
            'health-insurance_pd': userData.health_insurance || '',
            'insurance_no_pd': userData.insurance_no || ''
        };
        
        Object.entries(personalDataElements).forEach(([id, value]) => {
            const element = document.getElementById(id);
            if (element) {
                element.textContent = value;
                console.log(`Set ${id} to: ${value}`);
            }
        });
        
        console.log('Personal data filled');
        
        // Remplir les données du panier
        console.log('Filling cart data:', cartData);
        
        // BeleschBox number
        const beleschBoxElement = document.getElementById('beleschbox_number_pd');
        if (beleschBoxElement) {
            beleschBoxElement.textContent = cartData.beleschbox_number || 'Individuell';
            console.log('Set beleschbox_number_pd to:', cartData.beleschbox_number || 'Individuell');
        }
        
        // Produits
        console.log('Processing products:', cartData.products);
        if (cartData.products && Array.isArray(cartData.products)) {
            cartData.products.forEach(product => {
                console.log('Processing product:', product.name, 'quantity:', product.quantity);
                
                // Mapper le nom du produit à l'ID du template
                const productMapping = {
                    'händedesinfektion': 2,
                    'ffp 2 mundschutz': 4,
                    'einmalhandschuhe': 1,
                    'flächendesinfektion': 2
                };
                
                const templateId = productMapping[product.name.toLowerCase()];
                if (templateId) {
                    console.log(`Mapping product ${product.name} to template ID ${templateId}`);
                    
                    // Cocher la case
                    const checkboxElement = document.getElementById(`pd_${templateId}`);
                    if (checkboxElement) {
                        checkboxElement.innerHTML = '✓';
                    }
                    
                    // Mettre la quantité
                    const quantityElement = document.getElementById(`qty_pd_${templateId}`);
                    if (quantityElement) {
                        quantityElement.textContent = product.quantity;
                    }
                }
            });
        }
        
        // Créer le conteneur printableArea avec le HTML du PDF
        const existingPrintableArea = document.getElementById('printableArea');
        if (existingPrintableArea) {
            existingPrintableArea.remove();
        }
        
        const printableArea = document.createElement('div');
        printableArea.id = 'printableArea';
        printableArea.style.display = 'none'; // Caché par défaut
        document.body.appendChild(printableArea);
        
        // Générer le HTML du PDF et l'injecter dans printableArea
        const pdfHtml = createExactStep5Html(orderData);
        printableArea.innerHTML = pdfHtml;
        
        // Remplir la signature si disponible
        const signatureElement = printableArea.querySelector('.signature');
        if (signatureElement) {
            if (signatureData && signatureData.image_path) {
                // Nettoyer le base64
                let cleanSignature = signatureData.image_path;
                if (cleanSignature.startsWith('data:image/')) {
                    const base64Part = cleanSignature.split(',')[1];
                    if (base64Part) {
                        const cleanedBase64 = base64Part.replace(/[\s\r\n]/g, '');
                        cleanSignature = cleanSignature.split(',')[0] + ',' + cleanedBase64;
                    }
                }
                
                signatureElement.innerHTML = `
                    <div style="margin-top: 8px; width: 200px; height: 60px; border: 1px solid #ddd; padding: 4px; background: white; display: flex; align-items: center; justify-content: center;">
                        <img src="${cleanSignature}" style="max-width: 100%; max-height: 100%; object-fit: contain; display: block;" alt="Signature" />
                    </div>
                    <div style="font-weight: 600; font-size: 10px; margin-top: 4px;">Unterschrift Versicherte(r) oder Bevollmächtigte(r)</div>
                `;
                
                // Attendre la fin du chargement de l'image
                await new Promise((resolve) => {
                    const img = signatureElement.querySelector('img');
                    if (!img) return resolve();
                    if (img.complete) return resolve();
                    img.onload = () => resolve();
                    img.onerror = () => resolve();
                });
            } else {
                signatureElement.innerHTML = `
                    <div style="margin-top: 8px; width: 200px; height: 60px; border: 1px solid #ddd; padding: 4px; background: #f9f9f9; display: flex; align-items: center; justify-content: center;">
                        <span style="color: #999;">Keine Unterschrift</span>
                    </div>
                    <div style="font-weight: 600; font-size: 10px; margin-top: 4px;">Unterschrift Versicherte(r) oder Bevollmächtigte(r)</div>
                `;
            }
        }
        
        console.log('PDF data updated successfully with products and signature');
    }

    // Fonction qui utilise exactement la même logique que printPageArea1 de l'étape 5
    window.printOrderPdfLikeStep5 = function(orderData) {
        console.log('printOrderPdfLikeStep5 called with orderData:', orderData);
        
        try {
            // Créer le HTML exact comme dans l'étape 5
            console.log('Creating exact step 5 HTML...');
            const pdfHtml = createExactStep5Html(orderData);
            console.log('HTML created, length:', pdfHtml.length);
            
            // Utiliser exactement la même logique que printPageArea1
            console.log('Saving original content...');
            const originalContents = document.body.innerHTML;
            
            // Remplacer le contenu du body avec notre PDF
            console.log('Replacing body content with PDF HTML...');
            document.body.innerHTML = pdfHtml;
            
            // Imprimer (comme dans printPageArea1)
            console.log('Calling window.print()...');
            window.print();
            
            // Restaurer le contenu original
            console.log('Restoring original content...');
            document.body.innerHTML = originalContents;
            
            console.log('PDF generation completed successfully!');
        } catch (error) {
            console.error('Error in printOrderPdfLikeStep5:', error);
            alert('Fehler beim Generieren des PDFs: ' + error.message);
        }
    };

    // Créer le HTML exact de l'étape 5
    window.createExactStep5Html = function(orderData) {
        console.log('=== DEBUG createExactStep5Html ===');
        console.log('createExactStep5Html called with orderData:', orderData);
        console.log('orderData type:', typeof orderData);
        console.log('orderData keys:', Object.keys(orderData || {}));
        
        const userData = orderData.userData || {};
        const cartData = orderData.cartData || {};
        const signatureData = orderData.signatureData || {};
        
        console.log('userData:', userData);
        console.log('userData.gender:', userData.gender);
        console.log('userData.first_name:', userData.first_name);
        console.log('userData.last_name:', userData.last_name);
        console.log('userData.pflegegrad:', userData.pflegegrad);
        console.log('cartData:', cartData);
        console.log('cartData.beleschbox_number:', cartData.beleschbox_number);
        console.log('cartData.products:', cartData.products);
        console.log('signatureData:', signatureData);
        
        // Préparer les données exactement comme dans l'étape 5
        const boxChecked = {};
        for (let i = 1; i <= 6; i++) {
            boxChecked[i] = (cartData.beleschbox_number === i.toString()) ? '✓' : '';
        }
        
        const individuellChecked = (cartData.beleschbox_number === 'Individuell') ? '✓' : '';
        
        // Produits personnalisés
        let customProductsHtml = '';
        if (cartData.products && Array.isArray(cartData.products)) {
            cartData.products.forEach(product => {
                customProductsHtml += `<div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%; padding: 2px 0;">`;
                customProductsHtml += `${product.quantity}x ${product.name}`;
                customProductsHtml += `</div>`;
            });
        }
        
        // Gants
        const gloveChecked = { S: '', M: '', L: '', XL: '' };
        const gloveSize = cartData.glove_size || '';
        if (gloveSize) {
            gloveChecked[gloveSize.toUpperCase()] = '✓';
        }
        
        const gloveSectionDisplay = gloveSize ? '' : 'display: none;';
        
        // Signature sera injectée après coup dans le DOM
        console.log('=== SIGNATURE DEBUG START ===');
        console.log('signatureData:', signatureData);
        console.log('=== SIGNATURE DEBUG END ===');
        
        // Générer le HTML exact de l'étape 5
        return `
            <div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 10px; background: white;">
                <!-- Header -->
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px;">
                    <div>
                        <h1 style="color: #333; font-size: 22px; font-weight: bold; margin: 0 0 3px 0; font-family: serif;">
                            Auswahl der gewünschten BeleschBox
                        </h1>
                        <div style="color: #009ee1; font-size: 11px; font-weight: bold; margin-bottom: 3px;">
                            Lieferinformationen angeben
                        </div>
                        <div style="font-size: 11px; margin-bottom: 8px;">
                            Versicherte/r (gemäß Antrag auf Kostenübernahme):
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <img src="/frontend/assets/images/logo/belesch-logo-light.png" alt="BeleschBox Logo" style="height: 60px; width: auto; margin-bottom: 5px;">
                    </div>
                </div>

                <!-- Personal Information -->
                <div style="margin-bottom: 10px;">
                    <div style="display: flex; align-items: center; margin-bottom: 8px;">
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 16px; height: 16px; border: 2px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${(userData.gender === 'Frau') ? '✓' : ''}</div>
                            <span style="font-size: 12px;">Frau</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 16px; height: 16px; border: 2px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${(userData.gender === 'Herr') ? '✓' : ''}</div>
                            <span style="font-size: 12px;">Herr</span>
                        </div>
                    </div>
                    
                    <div style="display: flex; margin-bottom: 8px;">
                        <div style="margin-right: 40px;">
                            <span>Vorname:</span>
                            <div style="border-bottom: 1px solid #333; width: 200px; display: inline-block; margin-left: 10px;">
                                <span style="padding: 0 5px;">${userData.first_name || ''}</span>
                            </div>
                        </div>
                        <div>
                            <span>Nachname:</span>
                            <div style="border-bottom: 1px solid #333; width: 200px; display: inline-block; margin-left: 10px;">
                                <span style="padding: 0 5px;">${userData.last_name || ''}</span>
                            </div>
                        </div>
                    </div>

                    <div style="margin-bottom: 8px;">
                        <span style="font-size: 12px;">Pflegegrad:</span>
                        <div style="display: inline-flex; margin-left: 15px;">
                            <div style="display: flex; align-items: center; margin-right: 15px;">
                                <div style="width: 16px; height: 16px; border: 2px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${(userData.pflegegrad === '1') ? '✓' : ''}</div>
                                <span style="font-size: 12px;">1</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 15px;">
                                <div style="width: 16px; height: 16px; border: 2px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${(userData.pflegegrad === '2') ? '✓' : ''}</div>
                                <span style="font-size: 12px;">2</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 15px;">
                                <div style="width: 16px; height: 16px; border: 2px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${(userData.pflegegrad === '3') ? '✓' : ''}</div>
                                <span style="font-size: 12px;">3</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 15px;">
                                <div style="width: 16px; height: 16px; border: 2px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${(userData.pflegegrad === '4') ? '✓' : ''}</div>
                                <span style="font-size: 12px;">4</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div style="width: 16px; height: 16px; border: 2px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${(userData.pflegegrad === '5') ? '✓' : ''}</div>
                                <span style="font-size: 12px;">5</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BeleschBox Selection -->
                <div style="margin-bottom: 8px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 6px; margin-bottom: 8px;">
                        <!-- BeleschBox 1 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${boxChecked[1]}</div>
                                <img src="/frontend/assets/images/cubes/cube_blue.png" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 1</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                2x 100 Stück Einmalhandschuhe<br>
                                500 ml Handdesinfektion<br>
                                500 ml Flächendesinfektion<br>
                                12 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 2 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${boxChecked[2]}</div>
                                <img src="/frontend/assets/images/cubes/cube_blue.png" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 2</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                100 Stück Einmalhandschuhe<br>
                                2x 500 ml Handdesinfektion<br>
                                25 Stück Bettschutzeinlagen<br>
                                8 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 3 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${boxChecked[3]}</div>
                                <img src="/frontend/assets/images/cubes/cube_blue.png" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 3</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                1 Pack Desinfektionstücher<br>
                                1x 500 ml Handdesinfektion<br>
                                1x 500 ml Flächendesinfektion<br>
                                10 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 4 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${boxChecked[4]}</div>
                                <img src="/frontend/assets/images/cubes/cube_blue.png" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 4</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                2x 500 ml Flächendesinfektion<br>
                                2x 500 ml Handdesinfektion<br>
                                25 Stück Bettschutzeinlagen<br>
                                25 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 5 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${boxChecked[5]}</div>
                                <img src="/frontend/assets/images/cubes/cube_blue.png" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 5</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                2x 100 Stück Einmalhandschuhe<br>
                                500 ml Handdesinfektion<br>
                                1 Pack Desinfektionstücher<br>
                                4 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 6 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${boxChecked[6]}</div>
                                <img src="/frontend/assets/images/cubes/cube_blue.png" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 6</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                100 Stück Einmalhandschuhe<br>
                                500 ml Handdesinfektion<br>
                                500 ml Flächendesinfektion<br>
                                25 Stück Bettschutzeinlagen<br>
                                6 Stück FFP2 Masken
                            </div>
                        </div>
                    </div>

                    <!-- BeleschBox Individuell -->
                    <div style="border: 1px solid #ddd; padding: 8px; margin-bottom: 10px;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${individuellChecked}</div>
                            <img src="/frontend/assets/images/cubes/cube_blue.png" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox Individuell</strong>
                        </div>
                        <div style="margin-left: 28px; margin-top: 8px;">
                            <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                            <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                            <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                        </div>
                        <div style="margin-top: 5px;">
                            ${customProductsHtml}
                        </div>
                    </div>
                </div>

                <!-- Bettschutzeinlagen -->
                <div style="margin-bottom: 8px;">
                    <div style="margin-bottom: 10px;">
                        <span style="font-weight: bold;">Wiederverwendbare Bettschutzeinlagen:</span>
                        <div style="display: inline-flex; margin-left: 20px;">
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${(userData.bett_schutz === '1') ? '✓' : ''}</div>
                                <span>1</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${(userData.bett_schutz === '2') ? '✓' : ''}</div>
                                <span>2</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${(userData.bett_schutz === '3') ? '✓' : ''}</div>
                                <span>3</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${(userData.bett_schutz === '4') ? '✓' : ''}</div>
                                <span>4</span>
                            </div>
                        </div>
                    </div>
                    <div style="font-size: 12px; color: #666; margin-top: 5px;">
                        (Bis zu 250 Mal waschbar - Kostenfrei)
                    </div>
                </div>

                <!-- Handschuhgröße -->
                <div style="margin-bottom: 8px; ${gloveSectionDisplay}">
                    <div style="margin-bottom: 10px;">
                        <span style="font-weight: bold;">Handschuhgröße:</span>
                        <div style="display: inline-flex; margin-left: 20px;">
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${gloveChecked.S}</div>
                                <span>S</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${gloveChecked.M}</div>
                                <span>M</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${gloveChecked.L}</div>
                                <span>L</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${gloveChecked.XL}</div>
                                <span>XL</span>
                            </div>
                        </div>
                    </div>
                    <div style="font-size: 12px; color: #666; margin-left: 20px;">
                        (Bei fehlender Angabe wird Größe M geliefert)
                    </div>
                </div>

                <!-- Agreement Text -->
                <div style="margin-bottom: 8px; padding: 8px; border: 1px solid #ddd; background-color: #f9f9f9;">
                    <p style="margin: 0; font-size: 14px; line-height: 1.5;">
                        Die von mir getroffene Auswahl der BeleschBox kann ich jeden Monat neu festlegen.<br>
                        Änderungen werde ich der MedicCos Inko&Care GmbH rechtzeitig mitteilen.
                    </p>
                </div>

                <!-- Signature and Date -->
                <div style="margin-bottom: 15px; margin-top: 20px;">
                    <div class="signature" style="margin-bottom: 8px;">
                        <!-- Signature will be injected here -->
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="border-bottom: 1px solid #333; width: 200px; height: 20px; margin-bottom: 5px;"></div>
                            <span style="font-size: 12px;">Unterschrift</span>
                        </div>
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="border-bottom: 1px solid #333; width: 150px; height: 20px; margin-bottom: 5px;">
                                <span style="font-size: 12px; color: #333;">${new Date().toLocaleDateString('de-DE')}</span>
                            </div>
                            <span style="font-size: 12px;">Datum</span>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div style="text-align: center; font-size: 11px; color: #666; border-top: 1px solid #ddd; padding-top: 8px; margin-top: 15px;">
                    MedicCos Inko&Care GmbH Lindenbergplatz 1 - 38126 Braunschweig | +49 (0) 531 51605712 | info@belesch-box.de
                </div>
            </div>
        `;
    };

    // Affiche le PDF dans une modal avec le template de l'étape 5
    function showOrderPdfInModal(orderId) {
        console.log('showOrderPdfInModal called with orderId:', orderId);
        
        if (!orderId) {
            alert('Order ID nicht gefunden.');
            return;
        }

        currentOrderId = orderId;

        // Afficher un indicateur de chargement dans la modal
        const modalBody = document.getElementById('pdf-content');
        modalBody.innerHTML = '<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Chargement...</span></div><p class="mt-2">Chargement des données...</p></div>';
        
        // Ouvrir la modal
        $('#pdfModal').modal('show');

        // Récupérer les données de la commande et afficher le template HTML de l'étape 5
        fetch('/generate-order-data', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                orderId: orderId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.orderData) {
                currentOrderData = data.orderData;
                displayStep5Template(data.orderData);
            } else {
                modalBody.innerHTML = '<div class="alert alert-danger">Erreur lors du chargement des données: ' + (data.message || 'Erreur inconnue') + '</div>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            modalBody.innerHTML = '<div class="alert alert-danger">Erreur lors du chargement des données</div>';
        });
    }

    // Affiche le template HTML EXACT de l'étape 5
    function displayStep5Template(orderData) {
        const modalBody = document.getElementById('pdf-content');
        
        // Template HTML EXACT de l'étape 5 (copié de assemble.blade.php)
        const template = `
            <div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; background: white;">
                <!-- Header -->
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                    <div>
                        <h1 style="color: #333; font-size: 28px; font-weight: bold; margin: 0 0 10px 0; font-family: serif;">
                            Auswahl der gewünschten BeleschBox
                        </h1>
                        <div style="color: #009ee1; font-size: 16px; font-weight: bold; margin-bottom: 8px;">
                            Lieferinformationen angeben
                        </div>
                        <div style="font-size: 14px; margin-bottom: 10px;">
                            Versicherte/r (gemäß Antrag auf Kostenübernahme):
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <img src="{{asset('frontend/assets/images/logo/belesch-logo-light.png')}}" alt="BeleschBox Logo" style="height: 80px; width: auto; margin-bottom: 10px;">
                    </div>
                </div>

                <!-- Personal Information -->
                <div style="margin-bottom: 8px;">
                    <div style="display: flex; align-items: center; margin-bottom: 8px;">
                        <div style="display: flex; align-items: center; margin-right: 30px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.userData.gender === 'Frau' ? '✓' : ''}</div>
                            <span>Frau</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 30px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.userData.gender === 'Herr' ? '✓' : ''}</div>
                            <span>Herr</span>
                        </div>
                    </div>
                    
                    <div style="display: flex; margin-bottom: 8px;">
                        <div style="margin-right: 40px;">
                            <span>Vorname:</span>
                            <div style="border-bottom: 1px solid #333; width: 200px; display: inline-block; margin-left: 10px;">
                                <span style="padding: 0 5px;">${orderData.userData.first_name || ''}</span>
                            </div>
                        </div>
                        <div>
                            <span>Nachname:</span>
                            <div style="border-bottom: 1px solid #333; width: 200px; display: inline-block; margin-left: 10px;">
                                <span style="padding: 0 5px;">${orderData.userData.last_name || ''}</span>
                            </div>
                        </div>
                    </div>

                    <div style="margin-bottom: 8px;">
                        <span>Pflegegrad:</span>
                        <div style="display: inline-flex; margin-left: 20px;">
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.userData.pflegegrad === '1' ? '✓' : ''}</div>
                                <span>1</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.userData.pflegegrad === '2' ? '✓' : ''}</div>
                                <span>2</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.userData.pflegegrad === '3' ? '✓' : ''}</div>
                                <span>3</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.userData.pflegegrad === '4' ? '✓' : ''}</div>
                                <span>4</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.userData.pflegegrad === '5' ? '✓' : ''}</div>
                                <span>5</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BeleschBox Selection -->
                <div style="margin-bottom: 8px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 6px; margin-bottom: 8px;">
                        <!-- BeleschBox 1 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.beleschbox_number === 'BeleschBox 1' ? '✓' : ''}</div>
                                <!-- Logo cube bleu -->
                                <img src="{{asset('frontend/assets/images/cubes/cube_blue.png')}}" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 1</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                2x 100 Stück Einmalhandschuhe<br>
                                500 ml Handdesinfektion<br>
                                500 ml Flächendesinfektion<br>
                                12 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 2 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.beleschbox_number === 'BeleschBox 2' ? '✓' : ''}</div>
                                <!-- Logo cube bleu -->
                                <img src="{{asset('frontend/assets/images/cubes/cube_blue.png')}}" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 2</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                100 Stück Einmalhandschuhe<br>
                                2x 500 ml Handdesinfektion<br>
                                25 Stück Bettschutzeinlagen<br>
                                8 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 3 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.beleschbox_number === 'BeleschBox 3' ? '✓' : ''}</div>
                                <!-- Logo cube bleu -->
                                <img src="{{asset('frontend/assets/images/cubes/cube_blue.png')}}" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 3</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                1 Pack Desinfektionstücher<br>
                                1x 500 ml Handdesinfektion<br>
                                1x 500 ml Flächendesinfektion<br>
                                10 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 4 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.beleschbox_number === 'BeleschBox 4' ? '✓' : ''}</div>
                                <!-- Logo cube bleu -->
                                <img src="{{asset('frontend/assets/images/cubes/cube_blue.png')}}" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 4</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                2x 500 ml Flächendesinfektion<br>
                                2x 500 ml Handdesinfektion<br>
                                25 Stück Bettschutzeinlagen<br>
                                25 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 5 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.beleschbox_number === 'BeleschBox 5' ? '✓' : ''}</div>
                                <!-- Logo cube bleu -->
                                <img src="{{asset('frontend/assets/images/cubes/cube_blue.png')}}" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 5</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                2x 100 Stück Einmalhandschuhe<br>
                                500 ml Handdesinfektion<br>
                                1 Pack Desinfektionstücher<br>
                                4 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 6 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.beleschbox_number === 'BeleschBox 6' ? '✓' : ''}</div>
                                <!-- Logo cube bleu -->
                                <img src="{{asset('frontend/assets/images/cubes/cube_blue.png')}}" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 6</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                100 Stück Einmalhandschuhe<br>
                                500 ml Handdesinfektion<br>
                                500 ml Flächendesinfektion<br>
                                25 Stück Bettschutzeinlagen<br>
                                6 Stück FFP2 Masken
                            </div>
                        </div>
                    </div>

                    <!-- BeleschBox Individuell -->
                    <div style="border: 1px solid #ddd; padding: 8px; margin-bottom: 10px;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.beleschbox_number === 'Individuell' ? '✓' : ''}</div>
                            <!-- Logo cube bleu -->
                            <img src="{{asset('frontend/assets/images/cubes/cube_blue.png')}}" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox Individuell</strong>
                        </div>
                        <div style="margin-left: 28px; margin-top: 8px;">
                            <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                            <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                            <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                        </div>
                        <div style="margin-top: 5px;">
                            ${orderData.cartData.products ? orderData.cartData.products.map(product => 
                                '<div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">' + product.quantity + 'x ' + product.name + '<br></div>'
                            ).join('') : ''}
                        </div>
                    </div>
                </div>

                <!-- Bettschutzeinlagen -->
                <div style="margin-bottom: 8px;">
                    <div style="margin-bottom: 10px;">
                        <span style="font-weight: bold;">Wiederverwendbare Bettschutzeinlagen:</span>
                        <div style="display: inline-flex; margin-left: 20px;">
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;"></div>
                                <span>1</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;"></div>
                                <span>2</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;"></div>
                                <span>3</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;"></div>
                                <span>4</span>
                            </div>
                        </div>
                    </div>
                    <div style="font-size: 12px; color: #666; margin-top: 5px;">
                        (Bis zu 250 Mal waschbar - Kostenfrei)
                    </div>
                </div>

                <!-- Handschuhgröße -->
                <div style="margin-bottom: 8px; ${orderData.cartData.glove_size ? '' : 'display: none;'}">
                    <div style="margin-bottom: 10px;">
                        <span style="font-weight: bold;">Handschuhgröße:</span>
                        <div style="display: inline-flex; margin-left: 20px;">
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.glove_size === 'S' ? '✓' : ''}</div>
                                <span>S</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.glove_size === 'M' ? '✓' : ''}</div>
                                <span>M</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.glove_size === 'L' ? '✓' : ''}</div>
                                <span>L</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.glove_size === 'XL' ? '✓' : ''}</div>
                                <span>XL</span>
                            </div>
                        </div>
                    </div>
                    <div style="font-size: 12px; color: #666; margin-left: 20px;">
                        (Bei fehlender Angabe wird Größe M geliefert)
                    </div>
                </div>

                <!-- Agreement Text -->
                <div style="margin-bottom: 8px; padding: 8px; border: 1px solid #ddd; background-color: #f9f9f9;">
                    <p style="margin: 0; font-size: 14px; line-height: 1.5;">
                        Die von mir getroffene Auswahl der BeleschBox kann ich jeden Monat neu festlegen.<br>
                        Änderungen werde ich der MedicCos Inko&Care GmbH rechtzeitig mitteilen.
                    </p>
                </div>

                <!-- Signature and Date -->
                <div style="margin-bottom: 10px;">
                    <div style="margin-bottom: 8px;">
                        ${orderData.signatureData && orderData.signatureData.image_path ? 
                            '<img src="' + orderData.signatureData.image_path + '" style="width: 250px; height: 80px; border: 1px solid #ddd; border-radius: 3px; background: white; object-fit: contain;">' : 
                            ''
                        }
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="border-bottom: 1px solid #333; width: 200px; height: 20px; margin-bottom: 5px;"></div>
                            <span>Unterschrift</span>
                        </div>
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="border-bottom: 1px solid #333; width: 150px; height: 20px; margin-bottom: 5px;">
                                <span style="font-size: 12px; color: #333;">${new Date().toLocaleDateString('de-DE')}</span>
                            </div>
                            <span>Datum</span>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div style="text-align: center; font-size: 12px; color: #666; border-top: 1px solid #ddd; padding-top: 10px;">
                    MedicCos Inko&Care GmbH Lindenbergplatz 1 - 38126 Braunschweig | +49 (0) 531 51605712 | info@belesch-box.de
                </div>
            </div>
        `;
        
        modalBody.innerHTML = template;
    }

    // Affiche le PDF dans la modal avec le template EXACT de l'étape 5
    function displayPdfInModal(orderData) {
        const pdfContent = document.getElementById('pdf-content');
        
        // Template HTML EXACT de l'étape 5
        const template = `
            <div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; background: white;">
                <!-- Header -->
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                    <div>
                        <h1 style="color: #333; font-size: 28px; font-weight: bold; margin: 0 0 10px 0; font-family: serif;">
                            Auswahl der gewünschten BeleschBox
                        </h1>
                        <div style="color: #009ee1; font-size: 16px; font-weight: bold; margin-bottom: 8px;">
                            Lieferinformationen angeben
                        </div>
                        <div style="font-size: 14px; margin-bottom: 10px;">
                            Versicherte/r (gemäß Antrag auf Kostenübernahme):
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <img src="{{asset('frontend/assets/images/logo/belesch-logo-light.png')}}" alt="BeleschBox Logo" style="height: 80px; width: auto; margin-bottom: 10px;">
                    </div>
                </div>

                <!-- Personal Information -->
                <div style="margin-bottom: 8px;">
                    <div style="display: flex; align-items: center; margin-bottom: 8px;">
                        <div style="display: flex; align-items: center; margin-right: 30px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.userData.gender === 'Frau' ? '✓' : ''}</div>
                            <span>Frau</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 30px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.userData.gender === 'Herr' ? '✓' : ''}</div>
                            <span>Herr</span>
                        </div>
                    </div>
                    
                    <div style="display: flex; margin-bottom: 8px;">
                        <div style="margin-right: 40px;">
                            <span>Vorname:</span>
                            <div style="border-bottom: 1px solid #333; width: 200px; display: inline-block; margin-left: 10px;">
                                <span style="padding: 0 5px;">${orderData.userData.first_name || ''}</span>
                            </div>
                        </div>
                        <div>
                            <span>Nachname:</span>
                            <div style="border-bottom: 1px solid #333; width: 200px; display: inline-block; margin-left: 10px;">
                                <span style="padding: 0 5px;">${orderData.userData.last_name || ''}</span>
                            </div>
                        </div>
                    </div>

                    <div style="margin-bottom: 8px;">
                        <span>Pflegegrad:</span>
                        <div style="display: inline-flex; margin-left: 20px;">
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.userData.pflegegrad === '1' ? '✓' : ''}</div>
                                <span>1</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.userData.pflegegrad === '2' ? '✓' : ''}</div>
                                <span>2</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.userData.pflegegrad === '3' ? '✓' : ''}</div>
                                <span>3</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.userData.pflegegrad === '4' ? '✓' : ''}</div>
                                <span>4</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.userData.pflegegrad === '5' ? '✓' : ''}</div>
                                <span>5</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BeleschBox Selection -->
                <div style="margin-bottom: 8px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 6px; margin-bottom: 8px;">
                        <!-- BeleschBox 1 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.beleschbox_number === 'BeleschBox 1' ? '✓' : ''}</div>
                                <!-- Logo cube bleu -->
                                <img src="{{asset('frontend/assets/images/cubes/cube_blue.png')}}" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 1</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                2x 100 Stück Einmalhandschuhe<br>
                                500 ml Handdesinfektion<br>
                                500 ml Flächendesinfektion<br>
                                12 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 2 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.beleschbox_number === 'BeleschBox 2' ? '✓' : ''}</div>
                                <!-- Logo cube bleu -->
                                <img src="{{asset('frontend/assets/images/cubes/cube_blue.png')}}" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 2</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                100 Stück Einmalhandschuhe<br>
                                2x 500 ml Handdesinfektion<br>
                                25 Stück Bettschutzeinlagen<br>
                                8 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 3 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.beleschbox_number === 'BeleschBox 3' ? '✓' : ''}</div>
                                <!-- Logo cube bleu -->
                                <img src="{{asset('frontend/assets/images/cubes/cube_blue.png')}}" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 3</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                1 Pack Desinfektionstücher<br>
                                1x 500 ml Handdesinfektion<br>
                                1x 500 ml Flächendesinfektion<br>
                                10 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 4 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.beleschbox_number === 'BeleschBox 4' ? '✓' : ''}</div>
                                <!-- Logo cube bleu -->
                                <img src="{{asset('frontend/assets/images/cubes/cube_blue.png')}}" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 4</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                2x 500 ml Flächendesinfektion<br>
                                2x 500 ml Handdesinfektion<br>
                                25 Stück Bettschutzeinlagen<br>
                                25 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 5 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.beleschbox_number === 'BeleschBox 5' ? '✓' : ''}</div>
                                <!-- Logo cube bleu -->
                                <img src="{{asset('frontend/assets/images/cubes/cube_blue.png')}}" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 5</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                2x 100 Stück Einmalhandschuhe<br>
                                500 ml Handdesinfektion<br>
                                1 Pack Desinfektionstücher<br>
                                4 Stück FFP2 Masken
                            </div>
                        </div>

                        <!-- BeleschBox 6 -->
                        <div style="border: 1px solid #ddd; padding: 8px; position: relative;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.beleschbox_number === 'BeleschBox 6' ? '✓' : ''}</div>
                                <!-- Logo cube bleu -->
                                <img src="{{asset('frontend/assets/images/cubes/cube_blue.png')}}" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                                <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox 6</strong>
                            </div>
                            <div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">
                                100 Stück Einmalhandschuhe<br>
                                500 ml Handdesinfektion<br>
                                500 ml Flächendesinfektion<br>
                                25 Stück Bettschutzeinlagen<br>
                                6 Stück FFP2 Masken
                            </div>
                        </div>
                    </div>

                    <!-- BeleschBox Individuell -->
                    <div style="border: 1px solid #ddd; padding: 8px; margin-bottom: 10px;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.beleschbox_number === 'Individuell' ? '✓' : ''}</div>
                            <!-- Logo cube bleu -->
                            <img src="{{asset('frontend/assets/images/cubes/cube_blue.png')}}" alt="BeleschBox" style="width: 60px; height: 60px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 11px; font-weight: bold;">BeleschBox Individuell</strong>
                        </div>
                        <div style="margin-left: 28px; margin-top: 8px;">
                            <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                            <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                            <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                        </div>
                        <div style="margin-top: 5px;">
                            ${orderData.cartData.products ? orderData.cartData.products.map(product => 
                                `<div style="font-size: 9px; line-height: 1.2; color: #333; margin-left: 28px;">${product.quantity}x ${product.name}<br></div>`
                            ).join('') : ''}
                        </div>
                    </div>
                </div>

                <!-- Bettschutzeinlagen -->
                <div style="margin-bottom: 8px;">
                    <div style="margin-bottom: 10px;">
                        <span style="font-weight: bold;">Wiederverwendbare Bettschutzeinlagen:</span>
                        <div style="display: inline-flex; margin-left: 20px;">
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;"></div>
                                <span>1</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;"></div>
                                <span>2</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;"></div>
                                <span>3</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;"></div>
                                <span>4</span>
                            </div>
                        </div>
                    </div>
                    <div style="font-size: 12px; color: #666; margin-top: 5px;">
                        (Bis zu 250 Mal waschbar - Kostenfrei)
                    </div>
                </div>

                <!-- Handschuhgröße -->
                <div style="margin-bottom: 8px; ${orderData.cartData.glove_size ? '' : 'display: none;'}">
                    <div style="margin-bottom: 10px;">
                        <span style="font-weight: bold;">Handschuhgröße:</span>
                        <div style="display: inline-flex; margin-left: 20px;">
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.glove_size === 'S' ? '✓' : ''}</div>
                                <span>S</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.glove_size === 'M' ? '✓' : ''}</div>
                                <span>M</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 20px;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.glove_size === 'L' ? '✓' : ''}</div>
                                <span>L</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">${orderData.cartData.glove_size === 'XL' ? '✓' : ''}</div>
                                <span>XL</span>
                            </div>
                        </div>
                    </div>
                    <div style="font-size: 12px; color: #666; margin-left: 20px;">
                        (Bei fehlender Angabe wird Größe M geliefert)
                    </div>
                </div>

                <!-- Agreement Text -->
                <div style="margin-bottom: 8px; padding: 8px; border: 1px solid #ddd; background-color: #f9f9f9;">
                    <p style="margin: 0; font-size: 14px; line-height: 1.5;">
                        Die von mir getroffene Auswahl der BeleschBox kann ich jeden Monat neu festlegen.<br>
                        Änderungen werde ich der MedicCos Inko&Care GmbH rechtzeitig mitteilen.
                    </p>
                </div>

                <!-- Signature and Date -->
                <div style="margin-bottom: 10px;">
                    <div style="margin-bottom: 8px;">
                        ${orderData.signatureData && orderData.signatureData.image_path ? 
                            `<img src="${orderData.signatureData.image_path}" style="width: 250px; height: 80px; border: 1px solid #ddd; border-radius: 3px; background: white; object-fit: contain;">` : 
                            ''
                        }
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="border-bottom: 1px solid #333; width: 200px; height: 20px; margin-bottom: 5px;"></div>
                            <span>Unterschrift</span>
                        </div>
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="border-bottom: 1px solid #333; width: 150px; height: 20px; margin-bottom: 5px;">
                                <span style="font-size: 12px; color: #333;">${new Date().toLocaleDateString('de-DE')}</span>
                            </div>
                            <span>Datum</span>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div style="text-align: center; font-size: 12px; color: #666; border-top: 1px solid #ddd; padding-top: 10px;">
                    MedicCos Inko&Care GmbH Lindenbergplatz 1 - 38126 Braunschweig | +49 (0) 531 51605712 | info@belesch-box.de
                </div>
            </div>
        `;
        
        pdfContent.innerHTML = template;
    }

    </script>

    <div class="user-orders-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="orders-card">
                        
                        
                        <div class="search-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="search" 
                                           class="form-control search-input" 
                                           placeholder="Suchen nach ID, Typ, Status oder Datum..." 
                                           wire:model="searchTerm">
                                </div>
                                <div class="col-md-6 text-end">
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Klicken Sie auf die Überschriften zum Sortieren
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table orders-table">
                                <thead>
                                    <tr>
                                        <th class="sort" wire:click="sortOrder('orderId')">
                                            Bestell-ID {!! $sortLink !!}
                                        </th>
                                        <th class="sort" wire:click="sortOrder('orderType')">
                                            Typ {!! $sortLink !!}
                                        </th>
                                        <th class="sort" wire:click="sortOrder('created_at')">
                                            Datum {!! $sortLink !!}
                                        </th>
                                        <th class="sort" wire:click="sortOrder('deliveryStatus')">
                                            Status {!! $sortLink !!}
                                        </th>
                                        <th>Aktionen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($orders && count($orders) > 0)
                                        @foreach($orders as $key => $order)
                                            <tr>
                                                <td>
                                                    <strong>#{{ $order[0]->orderId }}</strong>
                                                </td>
                                                <td>
                                                    @if($order[0]->orderType == '1')
                                                        <span class="type-badge type-package">
                                                            <i class="fas fa-box me-1"></i>
                                                            Paket
                                                        </span>
                                                    @else
                                                        <span class="type-badge type-product">
                                                            <i class="fas fa-shopping-cart me-1"></i>
                                                            Produkt
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <i class="fas fa-calendar me-1 text-muted"></i>
                                                    {{ \Carbon\Carbon::parse($order[0]->created_at)->format('d/m/Y H:i') }}
                                                </td>
                                                <td>
                                                    @if($order[0]->deliveryStatus == '0')
                                                        <span class="status-badge status-pending">
                                                            <i class="fas fa-clock me-1"></i>
                                                            Ausstehend
                                                        </span>
                                                    @elseif($order[0]->deliveryStatus == '1')
                                                        <span class="status-badge status-accepted">
                                                            <i class="fas fa-check-circle me-1"></i>
                                                            Angenommen
                                                        </span>
                                                    @elseif($order[0]->deliveryStatus == '2')
                                                        <span class="status-badge status-transit">
                                                            <i class="fas fa-truck me-1"></i>
                                                            Unterwegs
                                                        </span>
                                                    @elseif($order[0]->deliveryStatus == '3')
                                                        <span class="status-badge status-delivered">
                                                            <i class="fas fa-check-double me-1"></i>
                                                            Geliefert
                                                        </span>
                                                    @else
                                                        <span class="status-badge status-rejected">
                                                            <i class="fas fa-times-circle me-1"></i>
                                                            Abgelehnt
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" 
                                                                class="action-btn" 
                                                                wire:click="editOrder('{{ $order[0]->orderId }}', '{{ $order[0]->orderType }}')"
                                                                data-toggle="modal" 
                                                                data-target="#editCustomer">
                                                            <i class="fas fa-eye me-1"></i>
                                                            Einzelheiten
                                                        </button>
                                                        @if($order[0]->deliveryStatus != '3')
                                                            <a href="{{ url('update-order?orderId=' . $order[0]->orderId) }}" 
                                                               class="action-btn ms-2">
                                                                <i class="fas fa-edit me-1"></i>
                                                                Bearbeiten
                                                            </a>
                                                        @endif
                                                        <button type="button" class="action-btn ms-2" onclick="console.log('Button clicked'); showOrderPdfInModal('{{ $order[0]->orderId }}')">
                                                            <i class="fas fa-file-pdf me-1"></i>
                                                            PDF anzeigen
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="no-orders">
                                                <i class="fas fa-shopping-bag"></i>
                                                <h4>Keine Bestellungen gefunden</h4>
                                                <p>Sie haben noch keine Bestellung aufgegeben oder keine Bestellung entspricht Ihrer Suche.</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Détails de la commande - Structure identique à l'admin -->
    <div class="modal fade" wire:ignore.self id="editCustomer" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bestelldetails #{{ $orderId ?? '' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">Produktbild</div>
                            <div class="col-md-3">Name</div>
                            <div class="col-md-3">Titel</div>
                            <div class="col-md-3">Menge</div>
                        </div>
                        @if(count($orderss)>0)
                            @foreach($orderss as $od)
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="p-2"
                                         src="{{asset('storage/'.$od['image'])}}"
                                         width="70px" alt="{{$od['altTag']}}"
                                         title="{{$od['titleTag']}}">
                                </div>
                                <div class="col-md-3">{{$od['name']}}</div>
                                <div class="col-md-3">{{$od['title']}}</div>
                                <div class="col-md-3">{{$od['qty']}}</div>
                            </div>
                            @endforeach
                        @else
                            <div class="row">
                                <div class="col-md-12 text-center py-4">
                                    <p class="text-muted">Keine Details für diese Bestellung verfügbar.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour afficher le PDF -->
<div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfModalLabel">BeleschBox Bestellformular</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 0;">
                <div id="pdf-content" style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; background: white;">
                    <!-- Le contenu PDF sera inséré ici -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                <button type="button" class="btn btn-primary" onclick="downloadOrderPdf()">
                    <i class="fas fa-download"></i> PDF herunterladen
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('livewire:load', function () {
    window.addEventListener('orderUpdated', () => {
        // Forcer l'ouverture de la modal après la mise à jour des données
        setTimeout(() => {
            $('#editCustomer').modal('show');
        }, 200);
    });
});

</script>

<script>
// Script supprimé - fonction déplacée en haut du fichier
</script>
