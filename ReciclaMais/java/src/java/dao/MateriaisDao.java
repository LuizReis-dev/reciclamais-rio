package dao;

import entidades.Catador;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;
import entidades.Material;

public class MateriaisDao {

    public static List<Material> getMateriais(int inicio, int total) {

        List<Material> list = new ArrayList<Material>();
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT * FROM material ORDER BY id LIMIT " + (inicio - 1) + ", " + total);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                Material material = new Material();
                material.setId(rs.getInt("id"));
                material.setNome(rs.getString("nome"));
                material.setMetaBonificacaoKg(rs.getDouble("meta_bonificacao_kg"));
                material.setPrecoCompraKg(rs.getDouble("preco_compra_kg"));
                material.setPrecoVendaKg(rs.getDouble("preco_venda_kg"));
                list.add(material);
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return list;
    }
    public static List<Material> getMateriais() {

        List<Material> list = new ArrayList<Material>();
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT * FROM material");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                Material material = new Material();
                material.setId(rs.getInt("id"));
                material.setNome(rs.getString("nome"));
                material.setMetaBonificacaoKg(rs.getDouble("meta_bonificacao_kg"));
                material.setPrecoCompraKg(rs.getDouble("preco_compra_kg"));
                material.setPrecoVendaKg(rs.getDouble("preco_venda_kg"));
                list.add(material);
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
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT count(*) AS contagem FROM material");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                contagem = rs.getInt("contagem");
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return contagem;
    }

    public static int excluirMaterial(Material material) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("DELETE FROM material WHERE id=?");
            ps.setInt(1, material.getId());

            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }

    public static int cadastrarMaterial(Material material) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("INSERT INTO MATERIAL(NOME,META_BONIFICACAO_KG, VALOR_BONIFICACAO, PRECO_COMPRA_KG, PRECO_VENDA_KG, IMAGEM, QTD_DISPONIVEL_VENDA) VALUES(?,?,?,?,?, ' ', 0)");
            ps.setString(1, material.getNome());
            ps.setDouble(2, material.getMetaBonificacaoKg());
            ps.setDouble(3, material.getValorBonificacao());
            ps.setDouble(4, material.getPrecoCompraKg());
            ps.setDouble(5, material.getPrecoVendaKg());
            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }
    
    public static Material getMaterialById(int id) {
        Material material = null;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("select * from material where id=?");
            ps.setInt(1, id);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                material = new Material();
                material.setId(rs.getInt("id"));
                material.setNome(rs.getString("nome"));
                material.setMetaBonificacaoKg(rs.getDouble("meta_bonificacao_kg"));
                material.setValorBonificacao(rs.getDouble("valor_bonificacao"));
                material.setPrecoCompraKg(rs.getDouble("preco_compra_kg"));
                material.setPrecoVendaKg(rs.getDouble("preco_venda_kg"));
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return material;
    }
    public static int editarMaterial(Material material) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("UPDATE material SET nome=?, meta_bonificacao_kg=?, valor_bonificacao=?, preco_compra_kg=?, preco_venda_kg=? WHERE id=?");
            ps.setString(1, material.getNome());
            ps.setDouble(2, material.getMetaBonificacaoKg());
            ps.setDouble(3, material.getValorBonificacao());
            ps.setDouble(4, material.getPrecoCompraKg());
            ps.setDouble(5, material.getPrecoVendaKg());
            ps.setInt(6, material.getId());

            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }
}
