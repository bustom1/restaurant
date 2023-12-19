document.addEventListener('alpine:init', () => {
    Alpine.store('card', {
        items: [],
        total: 0,
        qty: 0,
        add(newItem){
            console.log(newItem);
        }
    });
});