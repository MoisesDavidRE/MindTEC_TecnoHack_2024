<div id="recursos" class="content-section active">
    <h2 class="text-center mb-4" style="color: #1f6764; font-weight: bold;">Recursos</h2>
    <div class="d-flex justify-content-center gap-3 mb-4">
        <button class="btn btn-outline-success btn-lg shadow-sm px-4" onclick="openModal('leve')">Nivel Leve</button>
        <button class="btn btn-outline-warning btn-lg shadow-sm px-4" onclick="openModal('moderado')">Nivel Moderado</button>
        <button class="btn btn-outline-danger btn-lg shadow-sm px-4" onclick="openModal('severo')">Nivel Severo</button>
    </div>
    <div id="resourceContainer" class="container mt-4">
        <h4 class="text-muted text-center">No hay recursos añadidos aún. ¡Agrega uno para empezar!</h4>
    </div>
</div>

<div id="modal" class="modal" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Añadir Recurso</h5>
                <button type="button" class="btn-close text-white" aria-label="Close" onclick="closeModal()"></button>
            </div>
            <div class="modal-body">
                <label for="resourceTitle" class="form-label">Título del Recurso:</label>
                <input type="text" id="resourceTitle" class="form-control mb-3" placeholder="Escribe un título...">
                <label for="resourceContent" class="form-label">Contenido del Recurso:</label>
                <textarea id="resourceContent" class="form-control mb-3" rows="4" placeholder="Añade una descripción o enlace del recurso..."></textarea>
                <label for="resourceURL" class="form-label">URL (Video, Enlace, etc.):</label>
                <input type="url" id="resourceURL" class="form-control mb-3" placeholder="Coloca un enlace de video o recurso">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="saveResource()">Guardar</button>
            </div>
        </div>
    </div>
</div>

<style>
    #recursos {
        padding: 2rem;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    #modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, 0.5);
    }

    .btn-outline-success,
    .btn-outline-warning,
    .btn-outline-danger {
        transition: transform 0.2s ease, box-shadow 0.3s ease;
    }

    .btn-outline-success:hover,
    .btn-outline-warning:hover,
    .btn-outline-danger:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    #resourceContainer .card {
        margin-bottom: 1.5rem;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        transition: transform 0.2s ease;
    }

    #resourceContainer .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .modal-dialog {
        max-width: 500px;
    }

    .modal-content {
        border-radius: 10px;
    }

    .modal-header {
        border-bottom: none;
        justify-content: space-between;
        align-items: center;
    }

    .modal-footer {
        border-top: none;
    }
</style>

<script>
    let selectedStressLevel = '';

    // Función para abrir el modal y asignar el nivel de estrés
    function openModal(stressLevel) {
        selectedStressLevel = stressLevel;
        document.getElementById('modal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
        document.getElementById('resourceTitle').value = '';
        document.getElementById('resourceContent').value = '';
        document.getElementById('resourceURL').value = '';
    }

    function saveResource() {
        const title = document.getElementById('resourceTitle').value.trim();
        const content = document.getElementById('resourceContent').value.trim();
        const url = document.getElementById('resourceURL').value.trim();

        if (title && content && url) {
            const resourceContainer = document.getElementById('resourceContainer');
            const noResourcesText = resourceContainer.querySelector('h4');

            if (noResourcesText) {
                noResourcesText.remove();
            }

            const resourceElement = document.createElement('div');
            resourceElement.classList.add('card');
            resourceElement.innerHTML = `
                <div class="card-body">
                    <h5 class="card-title">${title}</h5>
                    <p class="card-text">${content}</p>
                    <p class="card-text stress-level ${getBadgeClass(selectedStressLevel)}">
                        Nivel de Estrés: ${capitalize(selectedStressLevel)}
                    </p>
                    <div class="resource-content">
                        ${isVideoURL(url) ? `<iframe width="100%" height="215" src="${url}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>` : `<a href="${url}" target="_blank">Ver Recurso</a>`}
                    </div>
                </div>
            `;
            resourceContainer.appendChild(resourceElement);

            saveToLocalStorage(title, content, url);

            closeModal();
        } else {
            alert('Por favor, llena todos los campos.');
        }
    }

    function isVideoURL(url) {
        return url.includes('youtube.com') || url.includes('vimeo.com');
    }


    function getBadgeClass(level) {
        switch (level) {
            case 'leve':
                return 'success';
            case 'moderado':
                return 'warning';
            case 'severo':
                return 'danger';
            default:
                return 'secondary';
        }
    }


    function capitalize(text) {
        return text.charAt(0).toUpperCase() + text.slice(1);
    }


    function saveToLocalStorage(title, content, url) {
        const resources = getResourcesFromLocalStorage();
        resources.push({ title, content, url, stressLevel: selectedStressLevel });
        localStorage.setItem('resources', JSON.stringify(resources));
    }


    function loadResourcesFromLocalStorage() {
        const resources = getResourcesFromLocalStorage();
        const resourceContainer = document.getElementById('resourceContainer');

        // Si no hay recursos, mostrar un mensaje
        if (resources.length === 0) {
            const noResourcesText = document.createElement('h4');
            noResourcesText.classList.add('text-muted', 'text-center');
            noResourcesText.innerText = 'No hay recursos añadidos aún. ¡Agrega uno para empezar!';
            resourceContainer.appendChild(noResourcesText);
        } else {
            // Remueve mensaje de no recursos si existen recursos
            const existingNoResourcesText = resourceContainer.querySelector('h4');
            if (existingNoResourcesText) {
                existingNoResourcesText.remove();
            }
        }

        resources.forEach(resource => {
            const resourceElement = document.createElement('div');
            resourceElement.classList.add('card');
            resourceElement.innerHTML = `
                <div class="card-body">
                    <h5 class="card-title">${resource.title}</h5>
                    <p class="card-text">${resource.content}</p>
                    <p class="card-text stress-level ${getBadgeClass(resource.stressLevel)}">
                        Nivel de Estrés: ${capitalize(resource.stressLevel)}
                    </p>
                    <div class="resource-content">
                                    ${isVideoURL(resource.url) ? `<iframe width="100%" height="215" src="${resource.url}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>` : `<a href="${resource.url}" target="_blank">Ver Recurso</a>`}
                    </div>
                </div>
            `;
            resourceContainer.appendChild(resourceElement);
        });
    }

    function getResourcesFromLocalStorage() {
        const resources = localStorage.getItem('resources');
        return resources ? JSON.parse(resources) : [];
    }

    window.onload = loadResourcesFromLocalStorage;
</script>

