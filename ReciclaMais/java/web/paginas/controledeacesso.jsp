<%
    String usuario = (String) request.getSession().getAttribute("funcionarioId");

    if (usuario == null) {
        response.sendRedirect("../index.jsp");
    } 
%>