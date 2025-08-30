console.log('Working');

document.addEventListener('DOMContentLoaded', () => {
    const formContainer = document.querySelector('.post-form');
    const formTitle = document.getElementById('form-title');
    const formAction = document.getElementById('form-action');
    const formId = document.getElementById('form-id');
    const formTitleInput = document.getElementById('form-title-input');
    const formDescInput = document.getElementById('form-desc-input');
    const formSubmit = document.getElementById('form-submit');
    const closeBtn = document.getElementById('close-form');
    const editButtons = document.querySelectorAll(".edit-btn");


    function setupForm(mode, data = {}) {
    formContainer.style.display = 'block';
        if (mode === 'create') {
            formTitle.textContent = 'Create News';
            formAction.value = 'create';
            formId.value = '';
            formTitleInput.value = '';
            formDescInput.value = '';
            formSubmit.textContent = 'Dodaj';
        }
        if (mode === 'edit') {
            formTitle.textContent = 'Edit News';
            formAction.value = 'edit';
            formId.value = data.id || '';
            formTitleInput.value = data.title || '';
            formDescInput.value = data.description || '';
            formSubmit.textContent = 'Save';
        }
    }

    // CREATE
    document.querySelector('#createBtn')?.addEventListener('click', () => {
        setupForm('create');
    });

    // EDIT
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            setupForm('edit', {
                id: btn.dataset.id,
                title: btn.dataset.title,
                description: btn.dataset.description
            });
        });
    });

    // CLOSE
    closeBtn?.addEventListener('click', () => {
        formContainer.style.display = 'none';
        closeBtn.style.display = "none";
        setupForm('create');
    });

    editButtons.forEach(btn => {
        btn.addEventListener("click", (e) => {
            e.preventDefault(); 
            closeBtn.style.display = "block";
        });
    });
});