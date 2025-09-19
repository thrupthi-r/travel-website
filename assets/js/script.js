// Wait for DOM to load
document.addEventListener('DOMContentLoaded', function() {
    
    // Load country details function
    window.loadCountryDetails = function(countryId) {
        fetch(`process/get_country.php?id=${countryId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const country = data.country;
                    const detailsHtml = `
                        <div class="destination-details">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="assets/images/destinations/${country.image_url}" 
                                         alt="${country.name}" 
                                         class="img-fluid rounded mb-3" 
                                         style="max-height: 400px; width: 100%; object-fit: cover;">
                                </div>
                                <div class="col-md-4">
                                    <h2><i class="fas fa-map-marker-alt me-2"></i>${country.name}</h2>
                                    <p class="text-muted">${country.description}</p>
                                    <div class="country-features">
                                        <h5>Why Visit ${country.name}?</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check text-success me-2"></i>Rich Cultural Heritage</li>
                                            <li><i class="fas fa-check text-success me-2"></i>Beautiful Landscapes</li>
                                            <li><i class="fas fa-check text-success me-2"></i>Local Cuisine</li>
                                            <li><i class="fas fa-check text-success me-2"></i>Historic Sites</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    document.getElementById('destination-details').innerHTML = detailsHtml;
                    
                    // Auto-select in enquiry form
                    document.getElementById('country').value = countryId;
                }
            })
            .catch(error => console.error('Error:', error));
    };

    // Form submission handler
    const enquiryForm = document.getElementById('enquiryForm');
    if (enquiryForm) {
        enquiryForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('process/enquiry.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('✅ Enquiry submitted successfully! We will contact you soon.');
                    this.reset();
                } else {
                    alert('❌ Error submitting enquiry: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('❌ An error occurred while submitting the enquiry.');
            });
        });
    }
});
