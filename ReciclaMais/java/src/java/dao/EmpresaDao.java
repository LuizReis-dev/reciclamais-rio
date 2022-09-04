package dao;

import java.util.List;
import entidades.Empresa;
import entidades.Usuario;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

public class EmpresaDao {

    public static List<Empresa> getEmpresas(int inicio, int total) {
        List<Empresa> list = new ArrayList<Empresa>();
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT id, nome, ramo, cnpj, id_usuario FROM empresa ORDER BY id LIMIT " + (inicio - 1) + ", " + total);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                Empresa empresa = new Empresa();
                empresa.setId(rs.getInt("id"));
                empresa.setNome(rs.getString("nome"));
                empresa.setRamo(rs.getString("ramo"));
                empresa.setCnpj(rs.getString("cnpj"));
                Usuario usuario = UsuarioDao.getUsuarioById(rs.getInt("id_usuario"));
                empresa.setUsuario(usuario);

                list.add(empresa);
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return list;
    }

    public static int getContagem() {
        int contagem = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT count(*) AS contagem FROM empresa");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                contagem = rs.getInt("contagem");
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return contagem;
    }

    public static int excluirEmpresa(Empresa empresa) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("DELETE FROM empresa WHERE id=?");
            ps.setInt(1, empresa.getId());
            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }

    public static int editarEmpresa(Empresa empresa) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("UPDATE empresa SET nome=?, email=?,endereco=?,telefone=? WHERE id=?");
            ps.setString(1, empresa.getNome());
            ps.setString(2, empresa.getEmail());
            ps.setString(3, empresa.getEndereco());
            ps.setString(4, empresa.getTelefone());
            ps.setInt(5, empresa.getId());
            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }

    public static Empresa getEmpresaById(int id) {
        Empresa empresa = null;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("select * from empresa where id=?");
            ps.setInt(1, id);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {

                empresa = new Empresa();
                empresa.setId(rs.getInt("id"));
                empresa.setNome(rs.getString("nome"));
                empresa.setEmail(rs.getString("email"));
                empresa.setCnpj(rs.getString("cnpj"));
                empresa.setEndereco(rs.getString("endereco"));
                empresa.setRamo(rs.getString("ramo"));
                empresa.setTelefone(rs.getString("telefone"));
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return empresa;
    }

    public static int cadastrarEmpresa(Empresa empresa) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("INSERT INTO EMPRESA(NOME,EMAIL,CNPJ,ENDERECO,TELEFONE,RAMO,ID_USUARIO) VALUES(?,?,?,?,?,?,0)");
            ps.setString(1, empresa.getNome());
            ps.setString(2, empresa.getEmail());
            ps.setString(3, empresa.getCnpj());
            ps.setString(4, empresa.getEndereco());
            ps.setString(5, empresa.getTelefone());
            ps.setString(6, empresa.getRamo());
            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }
}
