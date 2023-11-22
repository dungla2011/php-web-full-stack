var url = 'https://jsonplaceholder.typicode.com/todos';
fetch(url)
    .then(function(response) {
        return response.json();
    })
    .then(function(posts) {
        console.log(posts);
        let htmls = posts.map(function(post) {
            return `<li>
                <h2>${post.id}</h2>
                <p>${post.title}</p>
            </li>`;
        });
        let html = htmls.join('');
        document.getElementById('postBlock').innerHTML = html;
    })
    //case lấy post Api thất bại
    .catch(function(err) {
        console.log(err);
    })

