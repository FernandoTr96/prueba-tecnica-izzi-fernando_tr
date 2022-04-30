// formato a pesos
const options = { style: 'currency', currency: 'MXN' };
window.mxn = new Intl.NumberFormat('es-MX', options);

// limpiar simbolos de un numero con formato de pesos
window.cleanNumber = (number)=>{
    return number.replace('$','').replace(',','').replace('.00','');
}
