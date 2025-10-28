<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Records | HealthHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            min-height: 100vh;
        }

        .medical-card {
            background: linear-gradient(to bottom right, #ffffff, #f8fafc);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.7);
        }

        .form-header {
            background: linear-gradient(135deg, #3498db 0%, #2c80c5 100%);
            color: white;
            padding: 1.5rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(30deg);
        }

        .form-section {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .form-section:last-of-type {
            border-bottom: none;
        }

        .form-label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #2d3748;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #cbd5e0;
            border-radius: 8px;
            transition: all 0.3s ease;
            background-color: #fff;
        }

        .form-input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        .required::after {
            content: " *";
            color: #e53e3e;
        }

        .file-upload-area {
            border: 2px dashed #cbd5e0;
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            background-color: #f8fafc;
            cursor: pointer;
        }

        .file-upload-area:hover {
            border-color: #3498db;
            background-color: #f0f7ff;
        }

        .file-upload-area.dragover {
            border-color: #3498db;
            background-color: #e6f2ff;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3498db 0%, #2c80c5 100%);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(52, 152, 219, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(52, 152, 219, 0.3);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #10b981 0%, #0d9c6d 100%);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(16, 185, 129, 0.3);
        }

        .success-message {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: 0 4px 6px rgba(72, 187, 120, 0.2);
        }

        .current-file {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: #e6fffa;
            color: #234e52;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            margin-top: 0.75rem;
            font-size: 0.875rem;
        }

        .medical-icon {
            background: rgba(52, 152, 219, 0.1);
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3498db;
            font-size: 1.5rem;
        }

        @media (max-width: 768px) {
            .medical-card {
                margin: 1rem;
            }

            .form-section {
                padding: 1rem;
            }
        }
    </style>
</head>
<body class="py-8 px-4">
    <div class="max-w-3xl mx-auto">
        <div class="medical-card">
            <!-- Header -->
            <div class="form-header">
                <div class="flex items-center gap-4 relative z-10">
                    <div class="medical-icon">
                        <i class="fas fa-file-medical"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold">Personal Medical Record</h1>
                        <p class="text-blue-100 mt-1">Keep your health information safe and accessible</p>
                    </div>
                </div>
            </div>

            <!-- Success Message (Only show when needed) -->
            <!-- This would be conditionally displayed in a real application -->
            <!-- <div class="px-6 pt-6">
                <div class="success-message">
                    <i class="fas fa-check-circle"></i>
                    <span>Your medical record has been successfully saved!</span>
                </div>
            </div> -->

            <!-- Form -->
            <form action="{{ route('medical-records.store') }}" method="POST" enctype="multipart/form-data" class="space-y-0">
                @csrf

                <!-- Personal Information Section -->
                <div class="form-section">
                    <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                        <i class="fas fa-user text-blue-500"></i>
                        Personal Information
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="form-label required">Full Name</label>
                            <input type="text" name="name" id="name"
                                   value="{{ old('name', $record->name ?? '') }}"
                                   class="form-input"
                                   placeholder="Enter your full name"
                                   required>
                        </div>

                        <!-- Date of Birth -->
                        <div>
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" name="date_of_birth" id="date_of_birth"
                                   value="{{ old('date_of_birth', $record->date_of_birth ?? '') }}"
                                   class="form-input">
                        </div>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="form-section">
                    <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                        <i class="fas fa-address-book text-blue-500"></i>
                        Contact Information
                    </h2>

                    <div class="space-y-6">
                        <!-- Address -->
                        <div>
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" rows="2"
                                      class="form-input"
                                      placeholder="Enter your complete address">{{ old('address', $record->address ?? '') }}</textarea>
                        </div>

                        <!-- Phone -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone_no" class="form-label">Phone Number</label>
                                <input type="text" name="phone_no" id="phone_no"
                                       value="{{ old('phone_no', $record->phone_no ?? '') }}"
                                       class="form-input"
                                       placeholder="Enter your phone number">
                            </div>

                            <!-- Blood Group -->
                            <div>
                                <label for="blood_group" class="form-label">Blood Group</label>
                                <select name="blood_group" id="blood_group" class="form-input">
                                    <option value="">Select Blood Group</option>
                                    <option value="A+" {{ (old('blood_group', $record->blood_group ?? '') == 'A+') ? 'selected' : '' }}>A+</option>
                                    <option value="A-" {{ (old('blood_group', $record->blood_group ?? '') == 'A-') ? 'selected' : '' }}>A-</option>
                                    <option value="B+" {{ (old('blood_group', $record->blood_group ?? '') == 'B+') ? 'selected' : '' }}>B+</option>
                                    <option value="B-" {{ (old('blood_group', $record->blood_group ?? '') == 'B-') ? 'selected' : '' }}>B-</option>
                                    <option value="AB+" {{ (old('blood_group', $record->blood_group ?? '') == 'AB+') ? 'selected' : '' }}>AB+</option>
                                    <option value="AB-" {{ (old('blood_group', $record->blood_group ?? '') == 'AB-') ? 'selected' : '' }}>AB-</option>
                                    <option value="O+" {{ (old('blood_group', $record->blood_group ?? '') == 'O+') ? 'selected' : '' }}>O+</option>
                                    <option value="O-" {{ (old('blood_group', $record->blood_group ?? '') == 'O-') ? 'selected' : '' }}>O-</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Medical Documents Section -->
                <div class="form-section">
                    <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                        <i class="fas fa-file-upload text-blue-500"></i>
                        Medical Documents
                    </h2>

                    <div>
                        <label for="document_path" class="form-label">Upload Medical Document</label>
                        <div class="file-upload-area" id="fileUploadArea">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <i class="fas fa-cloud-upload-alt text-3xl text-blue-400"></i>
                                <p class="font-medium">Drag & drop your file here</p>
                                <p class="text-sm text-gray-500">or click to browse</p>
                                <p class="text-xs text-gray-400 mt-1">Supports: PDF, JPG, PNG (Max: 5MB)</p>
                            </div>
                            <input type="file" name="document_path" id="document_path"
                                   class="hidden" accept=".pdf,.jpg,.jpeg,.png">
                        </div>

                        <div id="fileName" class="mt-2 text-sm text-gray-600 hidden"></div>

                        @if(isset($record) && $record->document_path)
                            <div class="current-file">
                                <i class="fas fa-file-pdf text-red-500"></i>
                                <span>Current File:</span>
                                <a href="{{ asset('storage/' . $record->document_path) }}" target="_blank" class="text-blue-500 font-medium underline ml-1">
                                    View Document
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Additional Information Section -->
                <div class="form-section">
                    <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                        <i class="fas fa-sticky-note text-blue-500"></i>
                        Additional Information
                    </h2>

                    <div>
                        <label for="other_information" class="form-label">Medical Notes</label>
                        <textarea name="other_information" id="other_information" rows="4"
                                  class="form-input"
                                  placeholder="Allergies, current medications, medical history, emergency contacts, etc.">{{ old('other_information', $record->other_information ?? '') }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Include any important medical information that healthcare providers should know</p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-section bg-gray-50">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                        <div class="text-sm text-gray-500 flex items-center gap-2">
                            <i class="fas fa-shield-alt text-blue-400"></i>
                            <span>Your information is securely stored and encrypted</span>
                        </div>

                        <div class="flex gap-3">
                            @if(isset($record))
                                <a href="{{ route('medical-records.qr') }}" class="btn-secondary">
                                    <i class="fas fa-qrcode mr-2"></i>
                                    View QR Code
                                </a>
                            @endif

                            <button type="submit" class="btn-primary">
                                <i class="fas fa-save mr-2"></i>
                                {{ isset($record) ? 'Update Record' : 'Save Record' }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Security Note -->
        <div class="mt-6 text-center text-sm text-gray-500 flex items-center justify-center gap-2">
            <i class="fas fa-lock"></i>
            <span>All data is protected with 256-bit SSL encryption</span>
        </div>
    </div>

    <script>
        // File upload functionality
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('document_path');
            const fileUploadArea = document.getElementById('fileUploadArea');
            const fileName = document.getElementById('fileName');

            // Click on area to trigger file input
            fileUploadArea.addEventListener('click', function() {
                fileInput.click();
            });

            // Display file name when selected
            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    fileName.textContent = `Selected file: ${fileInput.files[0].name}`;
                    fileName.classList.remove('hidden');
                } else {
                    fileName.classList.add('hidden');
                }
            });

            // Drag and drop functionality
            fileUploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                fileUploadArea.classList.add('dragover');
            });

            fileUploadArea.addEventListener('dragleave', function() {
                fileUploadArea.classList.remove('dragover');
            });

            fileUploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                fileUploadArea.classList.remove('dragover');

                if (e.dataTransfer.files.length > 0) {
                    fileInput.files = e.dataTransfer.files;

                    if (fileInput.files.length > 0) {
                        fileName.textContent = `Selected file: ${fileInput.files[0].name}`;
                        fileName.classList.remove('hidden');
                    }
                }
            });
        });
    </script>
</body>
</html>
