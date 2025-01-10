<style>
@media print {
    @page {
        size: 3.375in 2.125in landscape;
        margin: 0;
    }
}
</style>

@foreach($students as $student)
<div class="col-md-2">
    <div class="id-card">
        <div class="id-card-front">
            <!-- Top Header with Logo and Stripe -->
            <div class="card-header">
                <div class="diagonal-stripe"></div>
                <img src="{{ asset('storage/'.$school->logo) }}" 
                     alt="School Logo" 
                     class="school-logo">
                <div class="school-name">{{ $school->name }}</div>
            </div>

            <!-- Student Details Section -->
            <div class="card-content">
                <!-- Left Side - QR Code -->
                <div class="qr-section">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $student->registration_number }}" 
                         alt="QR Code" 
                         class="qr-code">
                </div>

                <!-- Right Side - Photo -->
                <div class="photo-section">
                    <img src="{{ $student->photo ? asset('storage/'.$student->photo) : asset('assets/images/avatar.png') }}"
                         alt="Student Photo" 
                         class="student-photo">
                </div>
            </div>

            <!-- Student Name -->
            <div class="student-name">{{ $student->name }}</div>

            <!-- Student Info -->
            <div class="student-info">
                <div class="info-grid">
                    <div class="info-row">
                        <span class="label">Reg No</span>
                        <span class="separator">:</span>
                        <span class="value">{{ $student->registration_number }}</span>
                    </div>
                    <div class="info-row">
                        <span class="label">Father's Name</span>
                        <span class="separator">:</span>
                        <span class="value">{{ $student->father_name }}</span>
                    </div>
                    <div class="info-row">
                        <span class="label">Class</span>
                        <span class="separator">:</span>
                        <span class="value">{{ $student->class->name }}{{ $student->section ? ' - '.$student->section->name : '' }}</span>
                    </div>
                    <div class="info-row">
                        <span class="label">D.O.B</span>
                        <span class="separator">:</span>
                        <span class="value">{{ optional($student->date_of_birth)->format('d/m/Y') ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>

            <!-- Footer with Signature -->
            <div class="card-footer">
                <div class="signature-section">
                    <img src="{{ asset('storage/'.$school->principle_sign) }}"
                         alt="Principal Signature" 
                         class="signature-image">
                    <p class="signature-label">Principal's Signature</p>
                </div>
              
                <div class="school-address">{{ $school->address }}</div>
            </div>
        </div>
    </div>
</div>

<style>
/* CRM Color Palette */
:root {
    --crm-primary: #2E5BFF;      /* Primary Blue */
    --crm-secondary: #6C757D;    /* Secondary Gray */
    --crm-success: #00C853;      /* Success Green */
    --crm-danger: #FF3B30;       /* Danger Red */
    --crm-warning: #FFCC00;      /* Warning Yellow */
    --crm-info: #17A2B8;         /* Info Blue */
    --crm-dark: #1E2022;         /* Dark */
    --crm-light: #F8F9FA;        /* Light */
}

.id-card {
    width: 2.125in;
    height: 3.375in;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin: 10px auto;
    overflow: hidden;
    position: relative;
    font-family: 'Poppins', sans-serif;
}

.card-header {
    position: relative;
    height: 0.6in;
    background: var(--crm-primary);
    overflow: hidden;
}

.diagonal-stripe {
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    height: 100%;
    background: var(--crm-danger);
    transform: skewX(-20deg) translateX(20%);
}

.school-logo {
    position: absolute;
    width: 40px;
    height: 40px;
    top: 50%;
    left: 10px;
    transform: translate(0%, -50%);
    object-fit: contain;
    background: white;
    border-radius: 50%;
    padding: 2px;
    z-index: 1;
}

.school-name {
    position: absolute;
    top: 10px;
    left: 65px;
    font-size: 12px;
    color: white;
    text-align: center;
}

.card-content {
    display: flex;
    justify-content: space-between;
    gap: 0.1in;
}

.qr-section {
    width: 0.7in;
    height: 0.7in;
}

.qr-code {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.photo-section {
    width: 0.7in;
    height: 0.85in;
}

.student-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border: 2px solid var(--crm-primary);
    border-radius: 4px;
}

.student-name {
    font-size: 12px;
    font-weight: 600;
    color: var(--crm-primary);
    text-align: center;
    text-transform: uppercase;
    padding: 0.05in 0;
}



.info-grid {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.info-row {
    display: flex;
    line-height: 1.2;
}

.label {
    width: 0.6in;
    color: var(--crm-secondary);
    font-weight: 500;
}

.separator {
    width: 0.1in;
    text-align: center;
}

.value {
    flex: 1;
    color: var(--crm-dark);
}

.card-footer {
    margin-top: auto;
    padding: 0.05in;
    border-top: 1px solid #eee;
    text-align: center;
}

.signature-section {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.signature-image {
    height: 0.2in;
    max-width: 0.8in;
    object-fit: contain;
}

.signature-label {
    font-size: 5px;
    color: #666;
    margin: 2px 0 0 0;
}

.school-address {
    font-size: 8px;
    color: white;
    line-height: 1.2;
}

@media print {
    .id-card {
        width: 3.375in !important;
        height: 2.125in !important;
        margin: 0 !important;
        padding: 0 !important;
        page-break-after: always;
        print-color-adjust: exact;
        -webkit-print-color-adjust: exact;
    }
    
    .card-header {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    
    .diagonal-stripe {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    
    /* Ensure each card prints on a new page */
    .col-md-3 {
        page-break-after: always;
        margin: 0;
        padding: 0;
    }
}
</style>
@endforeach