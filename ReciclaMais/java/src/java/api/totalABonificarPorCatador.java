package api;

import dao.BonificacaoDao;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.json.JSONArray;
import org.json.JSONObject;

@WebServlet(name = "totalABonificarPorCatador", urlPatterns = {"/totalabonificarporcatador"})
public class totalABonificarPorCatador extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
        res.setHeader("Content-Type", "application/json");
        JSONObject objetoRetorno = new JSONObject();
        
        int idCatador = Integer.parseInt(req.getParameter("id_catador"));
        double totalAPagar = BonificacaoDao.totalAPagarPorCatador(idCatador);

        objetoRetorno.put("total", totalAPagar);
        PrintWriter out = res.getWriter();
        out.print(objetoRetorno.toString());
        out.flush();
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
}
