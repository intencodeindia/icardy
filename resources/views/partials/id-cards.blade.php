@foreach($students as $student)
<div class="col-md-4">
    <div class="id-card">
        <div class="header">
            <img src="{{ asset('storage/'.$school->logo) }}"
                alt="School Logo"
                class="school-logo" style="width: 100px; height: 100px;">
            <div class="school-info">
                <h5 class="school-name">{{ $student->class->school->name }}</h5>
                <p class="school-address">{{ $student->class->school->address }}</p>
                <p class="school-address">Contact: {{ $student->class->school->phone }}</p>
            </div>
        </div>

        <div class="content">
            <div class="photo-container">
                <div class="student-photo">
                    <img src="{{ $student->photo ? asset('storage/'.$student->photo) : asset('assets/images/avatar.png') }}"
                        alt="Student Photo" style="width: 100px; height: 100px;">
                </div>
            </div>

            <div class="details">
                <div class="student-name">{{ $student->name }}</div>
                <table class="info-table">
                    <tr>
                        <td>Reg No</td>
                        <td>: {{ $student->registration_number }}</td>
                    </tr>
                    <tr>
                        <td>Father's Name</td>
                        <td>: {{ $student->father_name }}</td>
                    </tr>
                    <tr>
                        <td>Class</td>
                        <td>: {{ $student->class->name }}{{ $student->section ? ' - '.$student->section->name : '' }}</td>
                    </tr>
                    <tr>
                        <td>D.O.B</td>
                        <td>: {{ optional($student->date_of_birth)->format('d/m/Y') ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>: {{ $student->phone_number }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="footer">
            <div class="signature">
                <img src="{{ asset('storage/'.$school->principle_sign) }}"
                    alt="Principal Signature" style="width: 100px; height: 100px;">
                <div class="signature-label">Principal's Signature</div>
            </div>
        </div>
    </div>
</div>
@endforeach