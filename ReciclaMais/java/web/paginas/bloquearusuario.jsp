<%@page import="entidades.Usuario"%>
<%@ page import="dao.UsuarioDao"%>
<jsp:useBean id="u" class="entidades.Usuario"></jsp:useBean>
<jsp:setProperty property="*" name="u" />


<%
    String id = request.getParameter("id");
    Usuario usuario = UsuarioDao.getUsuarioById(Integer.parseInt(id));
    
    int i = UsuarioDao.bloquearUsuario(usuario);
    
    if (i > 0) {
        response.sendRedirect("empresascontrolar.jsp?pag=1");
    } else {
        response.sendRedirect("usuariobloquear-erro.jsp");
    }
%>