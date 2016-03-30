function clickEdit(commentId, commentBody) {

         $("#comment"+commentId).append("<br><textarea class=\"form-control\" placeholder=\"This guy sucks\" name=\"commentBody\" cols=\"50\" rows=\"10\">"+commentBody+"</textarea>")
         $("#comment"+commentId).append("<input type=\"submit\" name=\"edit_comment\" value=\"Submit Edit\" class=\"btn btn-success\">");

}

function clickReply(commentId, originalAuthor) {

        $("#comment"+commentId).append("<br><textarea class=\"form-control\" placeholder=\"This guy sucks\" name=\"commentBody\" cols=\"50\" rows=\"10\">"+originalAuthor+"</textarea>")
        $("#comment"+commentId).append("<input type=\"submit\" name=\"reply_comment\" value=\"Submit Reply\" class=\"btn btn-success\">")
}
