package dao;

import entidades.Empresa;
import entidades.Usuario;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

public class UsuarioDao {

    public static int[] getRelatorioUsuarios() {

        int[] valores = {0, 0};

        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT count(*) AS ADM FROM usuario where Acesso = 'admin'");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                valores[0] = rs.getInt("ADM");
            }

            ps = (PreparedStatement) con.prepareStatement("SELECT count(*) AS Empresa FROM usuario where Acesso = 'empresa'");
            rs = ps.executeQuery();
            while (rs.next()) {
                valores[1] = rs.getInt("Empresa");
            }

        } catch (Exception erro) {
            System.out.println(erro);
        }
        return valores;
    }

    public static int bloquearUsuario(Usuario usuario) {
        int status = 0;
        String statusdousuario;

        if (usuario.getStatus().equals("ativo")) {
            statusdousuario = "inativo";
        } else {
            statusdousuario = "ativo";
        }
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("UPDATE usuario SET Status=? WHERE id=?");
            ps.setString(1, statusdousuario);
            ps.setInt(2, usuario.getId());
            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }
    
    public static Usuario getUsuarioById(int id) {
        Usuario usuario = null;      
    try{
        Connection con = ConnectionDao.getConnection();
        PreparedStatement ps = (PreparedStatement) con.prepareStatement("select * from usuario where id=?");
        ps.setInt(1, id);
        ResultSet rs = ps.executeQuery();
        while(rs.next()){
            usuario = new Usuario();
            usuario.setId(rs.getInt("id"));
            usuario.setStatus(rs.getString("status"));
        }
    }catch(Exception erro){
        System.out.println(erro);
    }      
        return usuario;
    }
    
}
