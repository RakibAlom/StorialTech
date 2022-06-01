"use strict";

function arrayMoveMutate(array, from, to) {
	const startIndex = from < 0 ? array.length + from : from;

	if (startIndex >= 0 && startIndex < array.length) {
		const endIndex = to < 0 ? array.length + to : to;

		const [item] = array.splice(from, 1);
		array.splice(endIndex, 0, item);
	}
};

function arrayMove(array, from, to) {
	array = [...array];
	arrayMoveMutate(array, from, to);
	return array;
};

window.addEventListener( 'DOMContentLoaded', function() {
    feather.replace();

    const sidebar           = document.getElementById( 'sidebar' );
    const sidebar_collapse  = document.getElementById( 'sidebar-collapse' );

    sidebar_collapse.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
    })

    const collection = document.getElementsByClassName('deleteButton');

    for(let i = 0; i < collection.length; i++) {
        const item = collection[i];

        item.addEventListener('click', function() {
            if(confirm("Are you sure you want to delete this item?")) {
                window.location.replace(item.dataset.confirm);
            }
        })
    }
});

window.bitflanRepeaterApp = function(props) {
    if(typeof props === 'string')
        props = JSON.parse(props);

    return {
        data: {
            fields: props.fields,
            items: props.items,
            items_bq: props.items_bq,
            errors: props.errors,
            key: props.key,
            dom_id: props.dom_id,
            title: props.title
        },

        deleteItem(index) {
            if(confirm("Are you sure you wanna delete this item?"))
                this.data.items = this.data.items.filter((item, new_index) => new_index != index)
        },

        moveItemUp(index) {
            if (index > 0)
                this.data.items = arrayMove(this.data.items, index, index - 1);
        },

        moveItemDown(index) {
            if (index < this.data.items.length - 1)
                this.data.items = arrayMove(this.data.items, index, index + 1);
        }
    }
}