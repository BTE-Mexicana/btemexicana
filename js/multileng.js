const translations={
    es: {
        title: "Bienvenido", 
        description: "Español",
    },
    en: {
        title: "Welcome",
        description: "English",
    }
};
function setLanguaje(lang){
    document.getElementById("title").textContent = translations[lang].title;
    document.getElementById("description").textContent = translations[lang].description;
}