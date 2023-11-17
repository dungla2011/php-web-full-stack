
<script>

async function getText(file) {
  let myObject = await fetch(file);
  let myText = await myObject.text();

//   console.log(myText);

  let js = JSON.parse(myText);

  console.log(js);
  //myDisplay(myText);
}

// getText("http://localhost/api/news?page=2");
getText("http://localhost/api/news/get?id=300");



</script>