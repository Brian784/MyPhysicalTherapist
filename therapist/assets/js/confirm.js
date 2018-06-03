function deleteArticle(id) {
    if (confirm("Are you sure you want to delete this article?")) {
        document.getElementById(id).submit();
    } else {
        return false;
    }
}
