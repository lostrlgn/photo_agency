
export async function getAllArticles() {
    try {
        const response = await fetch('/api/articles/all');
        const data = await response.json();
        console.log('articles:', data.articles);
    } catch (error) {
        console.error('Error fetching articles:', error);
    }
}

export async function addArticles(articlesData) {
    try {
        const response = await fetch('/api/articles/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ articles: [articlesData] }),
        });
        const data = await response.json();
        console.log('articles added:', data);
    } catch (error) {
        console.error('Error adding articles:', error);
    }
}

export async function editArticles(articlesId, updatedData) {
    try {
        const response = await fetch(`/api/articles/${articlesId}/edit`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ articles: [updatedData] }),
        });
        const data = await response.json();
        console.log('articles edited:', data);
    } catch (error) {
        console.error('Error editing articles:', error);
    }
}

export async function deleteArticles(articlesId) {
    try {
        const response = await fetch(`/api/articles/${articlesId}/delete`, {
            method: 'DELETE',
        });
        const data = await response.json();
        console.log('articles deleted:', data);
    } catch (error) {
        console.error('Error deleting articles:', error);
    }
}
