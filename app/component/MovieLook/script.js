let templateFile = await fetch("./component/Movie/template.html");
let template = await templateFile.text();

let Movie = {};

Movie.format = function (movie) {
  let html = template;
  html = html.replace("{{image}}", movie.image);
  html = html.replaceAll("{{name}}", movie.name);
  html = html.replace("{{real}}", movie.director);
  html = html.replace("{{year}}", movie.year);
  html = html.replace("{{duree}}", movie.length);
  html = html.replace("{{desc}}", movie.description);
  html = html.replace("{{cate}}", movie.id_category);
  html = html.replace("{{url}}", movie.trailer);
  html = html.replace("{{age}}", movie.min_age);
  return html;
};

export { Movie };





