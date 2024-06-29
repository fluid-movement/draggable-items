document.addEventListener("livewire:navigated", () => {
    const container = document.querySelector('.container');
    let draggedElement = null;
    let placeholder = document.createElement('div');
    placeholder.classList.add('placeholder');

    container.addEventListener("dragstart", handleDragStart);
    container.addEventListener("dragover", handleDragOver);
    container.addEventListener("drop", handleDrop);
    container.addEventListener("dragenter", handleDragEnter);
    container.addEventListener("dragleave", handleDragLeave);
    container.addEventListener("dragend", handleDragEnd);

    function handleDragStart(event) {
        if (event.target.classList.contains('js-draggable')) {
            draggedElement = event.target;
            event.dataTransfer.effectAllowed = "move";
            event.dataTransfer.setData("text/plain", event.target.id);
            event.target.classList.add("dragging");
            setTimeout(() => {
                event.target.style.display = 'none';
            }, 0);

            // Set placeholder dimensions
            placeholder.style.width = `${event.target.offsetWidth}px`;
            placeholder.style.height = `${event.target.offsetHeight}px`;
        }
    }

    function handleDragOver(event) {
        event.preventDefault(); // Necessary to allow a drop
        event.dataTransfer.dropEffect = "move";

        if (event.target.classList.contains('js-draggable') && event.target !== draggedElement) {
            const rect = event.target.getBoundingClientRect();
            const offset = (event.clientY - rect.top) / (rect.bottom - rect.top);
            if (offset > 0.5) {
                event.target.parentNode.insertBefore(placeholder, event.target.nextSibling);
            } else {
                event.target.parentNode.insertBefore(placeholder, event.target);
            }
        } else if (event.target.classList.contains('js-dropzone') && !event.target.contains(placeholder)) {
            event.target.appendChild(placeholder);
        }
    }

    function handleDrop(event) {
        event.preventDefault();
        if (placeholder.parentNode) {
            placeholder.parentNode.replaceChild(draggedElement, placeholder);
            draggedElement.style.display = 'block';
            draggedElement.classList.remove("dragging");
            draggedElement = null;
        }
        removeDragOverClass();
    }

    function handleDragEnter(event) {
        if (event.target.classList.contains('js-dropzone') ||
            event.target.classList.contains('js-draggable')) {
            event.target.classList.add('drag-over');
        }
    }

    function handleDragLeave(event) {
        if (event.target.classList.contains('js-dropzone') ||
            event.target.classList.contains('js-draggable')) {
            event.target.classList.remove('drag-over');
        }
    }

    function handleDragEnd(event) {
        if (draggedElement) {
            draggedElement.style.display = 'block';
            draggedElement.classList.remove("dragging");
            if (placeholder.parentNode) {
                placeholder.parentNode.removeChild(placeholder);
            }
            draggedElement = null;
        }
        removeDragOverClass();
    }

    function removeDragOverClass() {
        const elements = document.querySelectorAll('.drag-over');
        elements.forEach((el) => {
            el.classList.remove('drag-over');
        });
    }
});
