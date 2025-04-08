

let templateFile = await fetch('./component/updateMovie/template.html');
let template = await templateFile.text();


let updateMovie = {};

updateMovie.format = function(handler){
    let html= template;
    html = html.replace('{{handler}}', handler);
    return html;
}


export {updateMovie};