import './bootstrap';
import 'filepond/dist/filepond.min.css';// Para o CSS
import * as FilePond from 'filepond';    // Para o JS

// import Alpine from 'alpinejs';

document.addEventListener('DOMContentLoaded', function () {
    FilePond.create(document.querySelector('input[type="file"]'));
})
FilePond.create(document.querySelector('input[type="file"]'), {
    server: {
        url: '/NoticiasCadastro',  // A URL para onde o arquivo será enviado
        instantUpload: false,
        allowRemove: false,
        withCredentials: true,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    }
});;