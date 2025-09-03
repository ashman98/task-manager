$(document).ready(function() {
    const container = $('#tasks-container');

    let dragItem = null;

    container.on('dragstart', '.task-item', function(event) {
        dragItem = $(this);
        event.originalEvent.dataTransfer.effectAllowed = 'move';
        event.originalEvent.dataTransfer.setData('text/html', dragItem.prop('outerHTML'));
        dragItem.addClass('dragging');
    });

    container.on('dragover', function(event) {
        event.preventDefault();
        const afterElement = getDragAfterElement(container, event.clientY);
        const dragging = $('.dragging');

        if (afterElement === null) {
            container.append(dragging);
        } else {
            dragging.insertBefore(afterElement);
        }
    });

    container.on('dragend', '.task-item', function() {
        $(this).removeClass('dragging');
        reordering();
    });

    function getDragAfterElement(container, y) {
        const draggableElements = container.find('.task-item').not('.dragging');
        let closestElement = null;
        let closestOffset = Number.NEGATIVE_INFINITY;

        draggableElements.each(function () {
            const child = $(this);
            const box = this.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;

            if (offset < 0 && offset > closestOffset) {
                closestOffset = offset;
                closestElement = this;
            }
        });

        return closestElement
    }

    function reordering() {
        const tasks = container.find('.task-item');
        const priorities = {};

        tasks.each(function(index) {
            const task = $(this);
            const prevTask = tasks.eq(index - 1);
            const nextTask = tasks.eq(index + 1);

            const before = prevTask.length ? prevTask.data('priority') : null;
            const after = nextTask.length ? nextTask.data('priority') : null;
            let newPriority;

            if (before && after) {
                newPriority = (parseFloat(before) + parseFloat(after)) / 2;
            } else if (!before && after) {
                newPriority = parseFloat(after) - 1;
            } else {
                newPriority = parseFloat(before ?? 0) + 1;
            }

            task.data('priority', newPriority.toFixed(4));
            task.find('.priority-badge').text('#' + task.data('priority'));
            priorities[task.data('id')] = newPriority;
        });

        $.ajax({
            url: 'tasks/reorder',
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.Laravel.csrfToken
            },
            data: JSON.stringify({ priorities }),
            processData: false
        });
    }

    container.find('.task-item').attr('draggable', true);
});
