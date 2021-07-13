function _(elementID)
{
    return document.getElementById(elementID);
}

function isNumber(n) {  
      return !isNaN(parseFloat(n)) && isFinite(n);
    }