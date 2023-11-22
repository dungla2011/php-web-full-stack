var url = 'https://jsonplaceholder.typicode.com/posts';
fetch(url)
    .then(function(response) {
        return response.json();
    })
    .then(function(posts) {
        console.log(posts);
        let htmls = posts.map(function(post) {
            return `<li>
                <h2>${post.title}</h2>
                <p>${post.body}</p>
            </li>`;
        });
        let html = htmls.join('');
        document.getElementById('postBlock').innerHTML = html;
    })
    //case lấy post Api thất bại
    .catch(function(err) {
        console.log(err);
    })

