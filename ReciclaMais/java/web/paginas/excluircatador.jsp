<%@ page import="dao.CatadorDao"%>
<jsp:useBean id="u" class="entidades.Catador"></jsp:useBean>
<jsp:setProperty property="*" name="u" />


<%
    int i = CatadorDao.excluirCatador(u);
    
    if(i>0){
        response.sendRedirect("catadorescontrolar.jsp?pag=1");
    }else{
            response.sendRedirect("catador-erro.jsp");        
    }
%>