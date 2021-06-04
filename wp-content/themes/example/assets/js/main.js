const APARTMENT = 'apartment';
const PRIVATE_SECTOR = 'private_sector';
const ACTIVE_CLASS_NAME = 'selected';
let splide = null;

const hideOffers = type => {
    const offers = document.querySelectorAll(`.card-item[data-id="${type}"]`);
    offers.forEach(offer => offer.classList.add('hide'));
};

const updateVisibleArrows = (count) => {
    const arrows = document.querySelector('.splide__arrows');
    console.log(count);
    if (count <= 4) {
        arrows.classList.add('hide');
    } else {
        arrows.classList.remove('hide');
    }
};

const clearingCategories = () => {
    const categories = document.querySelectorAll('#categories .category');
    categories.forEach((category) => category.classList.remove(ACTIVE_CLASS_NAME));
};

const changeCategory = event => {
    const category = event.target;
    const id = category.dataset.id;

    if (!category.classList.contains('category')) {
        return;
    }

    clearingCategories();
    category.classList.add(ACTIVE_CLASS_NAME);
    const activeCategory = id !== APARTMENT ? APARTMENT : PRIVATE_SECTOR;
    hideOffers(activeCategory);

    // splide.go(0);
    const offers = document.querySelectorAll(`.card-item[data-id="${id}"]`);
    updateVisibleArrows(offers.length);
    offers.forEach(offer => offer.classList.remove('hide'));
};

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#categories').addEventListener('click', changeCategory);
    
    splide = new Splide('.splide', {
        perMove: 4,
        perPage: 4,
        pagination: false,
        fixedWidth: '23%',
        drag: false,
        breakpoints: {
            640: {
                perPage: 2,
                fixedWidth: 0,
            },
            840: {
                perPage: 3,
                fixedWidth: 0,
            }
        },
    }).mount();

    const countVisibleElements = document.querySelectorAll('.card-item:not(.hide)').length;
    updateVisibleArrows(countVisibleElements);
});